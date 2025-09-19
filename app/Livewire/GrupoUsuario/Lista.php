<?php

namespace App\Livewire\GrupoUsuario;

use App\Models\GrupoUsuarios;
use Livewire\Component;

class Lista extends Component
{
    public function deletar($id)
    {
        $grupo = GrupoUsuarios::find($id);

        if ($grupo) {
            $grupo->delete();
            session()->flash('message', 'Grupo deletado com sucesso!');
        } else {
            session()->flash('message', 'Grupo não encontrado!');
        }
    }

    public function render()
    {
        $grupos = GrupoUsuarios::all();

        return view('livewire.grupo-usuario.lista', [
            'grupos' => $grupos,
        ]);
    }
}
