<?php

namespace App\Livewire\Turma;

use App\Models\Turmas;
use Livewire\Component;

class CadastrarProfessor extends Component
{
    public $turmas = [];

    public function mount()
    {
        $this->turmas = Turmas::all();
    }

    public function render()
    {
        return view('livewire.turma.cadastrar-professor');
    }
}
