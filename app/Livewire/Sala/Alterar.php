<?php

namespace App\Livewire\Sala;

use App\Models\Salas;
use App\Models\Statues;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Alterar extends Component
{
    public $user_id;
    public $nome;
    public $status_id;
    public $limite;
    public $descricao;
    public $sala_id;
    public $user_deleted_id;
    public $statuses = [];

    protected $rules = [
        'nome' => 'required|string|max:255',
        'status_id' => 'required|integer|exists:statuses,id',
        'limite' => 'required|integer|min:1',
        'descricao' => 'nullable|string',
        'user_deleted_id' => 'nullable|integer|exists:users,id',
        'user_id' => 'required|integer|exists:users,id',
        'sala_id' => 'required|integer|exists:salas,id',
    ];

    public function mount($id)
    {
        $sala = Salas::findOrFail($id);

        $this->sala_id = $sala->id;
        $this->nome = $sala->nome;
        $this->status_id = $sala->status_id;
        $this->limite = $sala->limite;
        $this->descricao = $sala->descricao;
        $this->user_deleted_id = $sala->user_deleted_id;
        $this->user_id = $sala->user_id;

        $this->statuses = Statues::all();

    }

    public function atualizar()
    {
        $this->validate();

        $sala = Salas::find($this->sala_id);
        
        $sala-> nome = $this->nome;
        $sala-> status_id = $this->status_id;
        $sala-> limite = $this->limite;
        $sala-> descricao = $this->descricao;
        $sala-> user_deleted_id = $this->user_deleted_id;
        $sala-> user_id = $this->user_id;
        $sala->save();

        session()->flash('message', 'Sala atualizado com sucesso!');
    }

    public function cancelar()
    {
        $this->reset(); // limpa todos os campos
        session()->flash('message', 'Alterar cancelado!');
    }

    public function render()
    {
        return view('livewire.sala.alterar', [
            'statuses' => $this->statuses
        ]);
    }
}
