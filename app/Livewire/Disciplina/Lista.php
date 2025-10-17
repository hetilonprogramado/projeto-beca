<?php

namespace App\Livewire\Disciplina;

use App\Models\Disciplina;
use Livewire\Component;

class Lista extends Component
{

    public function deletar($id)
    {
        $disciplina = Disciplina::find($id);

        if ($disciplina) {
            $disciplina->delete();
            session()->flash('message', 'Disciplina deletado com sucesso!');
        } else {
            session()->flash('message', 'Disciplina não encontrado!');
        }
    }

    public function render()
    {
        $disciplinas = Disciplina::all();

        return view('livewire.disciplina.lista', [
            'disciplinas' => $disciplinas,
        ]);
    }
}
