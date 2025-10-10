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
    public $user_id;
    public $statuses = [];

    protected $rules = [
        'nome' => 'required|min:4',
        'status_id' => 'required|exists:statuses,id',
        'user_id' => 'required|exists:users,id',
    ];

    public function mount($id)
    {
        $grupo = GrupoUsuarios::findOrFail($id);

        $this->nome = $grupo->nome;
        $this->grupo_id = $grupo->id;

        $this->statuses = Statues::all();
    }

    public function atualizar()
    {
        $this->validate();

        GrupoUsuarios::where('id', $this->grupoId)->update([
            'nome' => $this->nome
        ]);

        session()->flash('message', 'Grupo atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.grupo-usuario.alterar');
    }
}
