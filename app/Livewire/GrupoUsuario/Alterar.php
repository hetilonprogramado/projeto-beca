<?php

namespace App\Livewire\GrupoUsuario;

use App\Models\GrupoUsuarios;
use App\Models\Statues;
use Livewire\Component;

class Alterar extends Component
{
    public $nome;
    public $grupo_id;
    public $status_id;
    public $statuses = [];

    protected $rules = [
        'nome' => 'required|min:4',
        'status_id' => 'required|exists:statuses,id',
    ];

    public function mount($id)
    {
        $grupo = GrupoUsuarios::findOrFail($id);

        $this->grupo_id = $grupo->id;
        $this->nome = $grupo->nome;
        $this->status_id = $grupo->status_id;

        $this->statuses = Statues::all();
    }

    public function atualizar()
    {
        $this->validate();

        $grupo = GrupoUsuarios::find($this->grupo_id);

        if (!$grupo) {
            session()->flash('error', 'Grupo não encontrado.');
            return;
        }

        $grupo->nome = $this->nome;
        $grupo->status_id = $this->status_id;
        $grupo->save();

        session()->flash('message', 'Grupo atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.grupo-usuario.alterar');
    }
}
