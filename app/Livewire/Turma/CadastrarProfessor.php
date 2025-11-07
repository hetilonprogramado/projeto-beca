<?php

namespace App\Livewire\Turma;

use App\Models\Funcionario;
use App\Models\Turmas;
use Livewire\Component;

class CadastrarProfessor extends Component
{
    public $turmas = [];
    public $funcionarios;

    public function mount()
    {
        $this->turmas = Turmas::all();
        $this->funcionarios = Funcionario::all();
    }

    public function render()
    {
        return view('livewire.turma.cadastrar-professor', [
            'turmas' => $this->turmas,
            'funcionarios' => $this->funcionarios,
        ]);
    }
}
