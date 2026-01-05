<?php

namespace App\Livewire\Produtos;

use App\Models\Produto as ModelsProduto;
use Livewire\Component;

class Produto extends Component
{
    public $nome;
    public $preco;
    public $estoque;
    public $categoria;
    public $codigo;

    public $produtos = [];

    protected $rules = [
        'nome' => 'required|min:4',
        'preco' => 'required|numeric',
        'estoque' => 'required|integer',
        'categoria' => 'nullable|min:3',
        'codigo' => 'nullable|min:2',
    ];

    public function mount()
    {
        $this->produtos = ModelsProduto::all();
    }

    public function salvar()
    {

        $this->validate();

        ModelsProduto::create([
            'nome' => $this->nome,
            'preco' => $this->preco,
            'estoque' => $this->estoque,
            'categoria' => $this->categoria,
            'codigo' => $this->codigo,
        ]);

        $this->reset();

        $this->produtos = ModelsProduto::all(); // atualiza tabela
        session()->flash('message', 'Produto cadastrado com sucesso!');
    }

    public function render()
    {
        return view('livewire.produtos.produto');
    }
}
