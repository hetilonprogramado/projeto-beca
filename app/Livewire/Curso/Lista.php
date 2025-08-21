<?php

namespace App\Livewire\Curso;

use App\Models\Curso;
use Livewire\Component;

class Lista extends Component
{
    public function render()
    {
        $cursos = Curso::all();

        return view('livewire.curso.lista', [
            'cursos' => $cursos,
        ]);
    }
}
