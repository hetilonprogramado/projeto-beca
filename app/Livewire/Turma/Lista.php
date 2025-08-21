<?php

namespace App\Livewire\Turma;

use App\Models\Turmas;
use Livewire\Component;

class Lista extends Component
{
    public function render()
    {
        $turmas = Turmas::all();

        return view('livewire.turma.lista', [
            'turmas' => $turmas
        ]);
    }
}
