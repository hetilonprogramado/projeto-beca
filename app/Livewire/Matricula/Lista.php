<?php

namespace App\Livewire\Matricula;

use App\Models\Matriculas;
use Livewire\Component;

class Lista extends Component
{
    public function deletar($id){
        $matricula = Matriculas::find($id);

        if ($matricula) {
            $matricula->delete();
            session()->flash('message', 'Matricula deletado com sucesso!');
        } else {
            session()->flash('message', 'Matricula não encontrado!');
        }
    }

    public function render()
    {
        $matriculas = Matriculas::all();

        return view('livewire.matricula.lista', [
            'matriculas' => $matriculas
        ]);
    }
}
