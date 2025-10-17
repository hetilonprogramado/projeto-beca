<?php

namespace App\Livewire\GrupoDisciplina;

use App\Models\GrupoDisciplina;
use Livewire\Component;

class Lista extends Component
{

    public function deletar($id)
    {
        $grupoDisciplinas = GrupoDisciplina::find($id);

        if ($grupoDisciplinas) {
            $grupoDisciplinas->delete();
            session()->flash('message', 'Grupo Disciplina deletado com sucesso!');
        } else {
            session()->flash('message', 'Grupo Disciplina não encontrado!');
        }
    }

    public function render()
    {
        $grupoDisciplinas = GrupoDisciplina::all();

        return view('livewire.grupo-disciplina.lista', [
            'grupoDisciplinas' => $grupoDisciplinas,
        ]);
    }
}
