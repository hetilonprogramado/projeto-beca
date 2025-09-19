<?php

namespace App\Livewire\Sala;

use App\Models\Salas;
use Livewire\Component;

class Alterar extends Component
{
    public $user_id;
    public $nome;
    public $status_id;
    public $limite;
    public $descricao;
    public $salaId;
    public $user_deleted_id;

    protected $rules = [
        'nome' => 'required|min:4',
        'status_id' => 'required|exists:statuses,id',
        'limite' => 'required|numeric|min:1', // Minimum 1
        'descricao' => 'nullable|string|max:255',
        'user_deleted_id' => 'nullable|exists:users,id',
    ];

    public function mount($id)
    {
        $sala = Salas::findOrFail($id);

        $this->nome = $sala->nome;
        $this->status_id = $sala->status_id;
        $this->limite = $sala->limite;
        $this->salaId = $sala->id;
        $this->descricao = $sala->descricao;
        $this->user_deleted_id = $sala->user_deleted_id;
    }

    public function atualizar()
    {
        $this->validate();

        Salas::where('id', $this->salaId)->update([
            'nome' => $this->nome,
            'status_id' => $this->status_id,
            'limite' => $this->limite,
            'descricao' => $this->descricao,
            'user_deleted_id' => $this->user_deleted_id
        ]);

        session()->flash('message', 'Sala atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.sala.alterar');
    }
}
