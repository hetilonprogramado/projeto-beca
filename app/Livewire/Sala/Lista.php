<?php

namespace App\Livewire\Sala;

use App\Models\Salas;
use Livewire\Component;

class Lista extends Component
{
    public function deletar($id)
    {
        $sala = Salas::find($id);

        if ($sala) {
            $sala->delete();
            session()->flash('message', 'Sala deletado com sucesso!');
        } else {
            session()->flash('message', 'Sala não encontrado!');
        }
    }

    public function render()
    {
        $salas = Salas::all();

        return view('livewire.sala.lista', [
            'salas' => $salas,
        ]);
    }
}
