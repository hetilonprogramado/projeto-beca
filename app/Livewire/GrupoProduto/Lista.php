<?php

namespace App\Livewire\GrupoProduto;

use App\Models\GrupoProdutos;
use Livewire\Component;

class Lista extends Component
{
    public function deletar($id)
    {
        $grupo = GrupoProdutos::find($id);

        if ($grupo) {
            $grupo->delete();
            session()->flash('message', 'Grupo deletado com sucesso!');
        } else {
            session()->flash('message', 'Grupo não encontrado!');
        }
    }

    public function render()
    {
        $grupos = GrupoProdutos::all();

        return view('livewire.grupo-produto.lista', [
            'grupos' => $grupos,
        ]);
    }
}
