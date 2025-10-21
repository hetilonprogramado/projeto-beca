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
        'nome' => 'required|min:3|max:100',
        'status_id' => 'required|exists:statuses,id',
        'limite' => 'required|numeric|min:1|max:9999',
        'descricao' => 'nullable|string|max:255',
    ];

    public function mount($id)
    {
        $sala = Salas::findOrFail($id);

        $this->sala_id = $sala->id;
        $this->nome = $sala->nome;
        $this->status_id = $sala->status_id;
        $this->limite = $sala->limite;
        $this->descricao = $sala->descricao;

        // Se quiser guardar quem está alterando
        $this->user_id = Auth::id();

        $this->statuses = Statues::all();
    }

    public function atualizar()
    {
        $this->validate();

        $sala = Salas::find($this->sala_id);

        if (!$sala) {
            session()->flash('error', 'Sala não encontrada.');
            return;
        }

        $sala->update([
            'nome' => $this->nome,
            'status_id' => $this->status_id,
            'limite' => $this->limite,
            'descricao' => $this->descricao,
            'user_deleted_id' => $this->user_deleted_id ?? null,
        ]);

        session()->flash('message', 'Sala atualizada com sucesso!');
    }

    public function render()
    {
        return view('livewire.sala.alterar', [
            'statuses' => $this->statuses
        ]);
    }
}
