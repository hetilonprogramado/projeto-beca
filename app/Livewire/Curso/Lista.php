<?php

namespace App\Livewire\Curso;

use App\Models\Curso;
use Livewire\Component;

class Lista extends Component
{
    public function deletar($id)
    {
        $curso = Curso::find($id);

        if ($curso) {
            $curso->delete();
            session()->flash('message', 'Curso deletado com sucesso!');
        } else {
            session()->flash('message', 'Curso não encontrado!');
        }
    }

    public function render()
    {
        $cursos = Curso::all();

        return view('livewire.curso.lista', [
            'cursos' => $cursos,
        ]);
    }
}
