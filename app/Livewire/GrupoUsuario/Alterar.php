<?php

namespace App\Livewire\GrupoUsuario;

use App\Models\GrupoUsuarios;
use Livewire\Component;

class Alterar extends Component
{
    public $nome;
    public $grupo_id;
    public $data_inicial;
    public $status_id;
    public $user_id;

    protected $rules = [
        'nome' => 'required|min:4',
        'data_inicial' => 'required|date',
        'status_id' => 'required|exists:statuses,id',
        'user_id' => 'required|exists:users,id',
    ];

    public function mount($id)
    {
        $grupo = GrupoUsuarios::findOrFail($id);

        $this->nome = $grupo->nome;
        $this->grupo_id = $grupo->id;
        $this->data_inicial = $grupo->data_inicial;
    }

    public function atualizar()
    {
        $this->validate();

        GrupoUsuarios::where('id', $this->grupoId)->update([
            'nome' => $this->nome,
            'data_inicial' => $this->data_inicial
        ]);

        session()->flash('message', 'Grupo atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.grupo-usuario.alterar');
    }
}
