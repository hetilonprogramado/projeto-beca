<?php

namespace App\Livewire\Produtos;

use App\Models\Produtos;
use Livewire\Component;

class Lista extends Component
{
    public function deletar($id)
    {
        $produto = Produtos::find($id);

        if ($produto) {
            $produto->delete();
            session()->flash('message', 'Produto deletado com sucesso!');
        } else {
            session()->flash('message', 'Produto não encontrado!');
        }
    }

    public function render()
    {
        $produtos = Produtos::all();

        return view('livewire.produtos.lista', [
            'produtos' => $produtos,
        ]);
    }
}
