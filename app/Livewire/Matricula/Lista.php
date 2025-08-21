<?php

namespace App\Livewire\Matricula;

use App\Models\Matriculas;
use Livewire\Component;

class Lista extends Component
{
    public function render()
    {
        $matriculas = Matriculas::all();

        return view('livewire.matricula.lista', [
            'matriculas' => $matriculas
        ]);
    }
}
