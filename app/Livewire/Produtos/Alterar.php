<?php

namespace App\Livewire\Produtos;

use App\Models\GrupoProdutos;
use App\Models\Produtos;
use App\Models\Statues;
use Livewire\Component;

class Alterar extends Component
{
    public $empresa_id;
    public $produto_id;
    public $grup_prod_id;
    public $nome;
    public $vlr_compra;
    public $vlr_venda;
    public $estoque_minimo;
    public $codigo_barras;
    public $status_id;
    public $user_id;
    public $user_deleted_id;
    public $grupo_fiscal_id;
    public $grupo_produto_id;
    public $utilizacao;
    public $ncm;
    public $combo;
    public $imagem;

    public $grupos = [];
    public $statuses = [];

    protected $rules = [
        'empresa_id' => 'required',
        'grup_prod_id' => 'required',
        'nome' => 'required|string|max:255',
        'vlr_compra' => 'nullable|numeric',
        'vlr_venda' => 'nullable|numeric',
        'estoque_minimo' => 'nullable|integer',
        'codigo_barras' => 'nullable|string|max:255',
        'status_id' => 'required|integer',
        'user_id' => 'required|integer',
        'user_deleted_id' => 'nullable|integer',
        'grupo_fiscal_id' => 'nullable|integer',
        'grupo_produto_id' => 'nullable|integer',
        'utilizacao' => 'nullable|string|max:255',
        'ncm' => 'nullable|string|max:255',
        'combo' => 'nullable|boolean',
        'imagem' => 'nullable|string|max:255',
    ];

    public function mount($id)
    {
        $produto = Produtos::findOrFail($id);

        $this->produto_id = $produto->id;
        $this->empresa_id = $produto->empresa_id;
        $this->grup_prod_id = $produto->grup_prod_id;
        $this->nome = $produto->nome;
        $this->vlr_compra = $produto->vlr_compra;
        $this->vlr_venda = $produto->vlr_venda;
        $this->estoque_minimo = $produto->estoque_minimo;
        $this->codigo_barras = $produto->codigo_barras;
        $this->status_id = $produto->status_id;
        $this->user_id = $produto->user_id;
        $this->user_deleted_id = $produto->user_deleted_id;
        $this->grupo_fiscal_id = $produto->grupo_fiscal_id;
        $this->grupo_produto_id = $produto->grupo_produto_id;
        $this->utilizacao = $produto->utilizacao;
        $this->ncm = $produto->ncm;
        $this->combo = $produto->combo;
        $this->imagem = $produto->imagem;

        $this->grupos = GrupoProdutos::all();
        $this->statuses = Statues::all();
    }

    public function atualizar()
    {
        $this->validate();

        Produtos::where('id', $this->produto_id_id)->update([
            'empresa_id' => $this->empresa_id,
            'grup_prod_id' => $this->grup_prod_id,
            'nome' => $this->nome,
            'vlr_compra' => $this->vlr_compra,
            'vlr_venda' => $this->vlr_venda,
            'estoque_minimo' => $this->estoque_minimo,
            'codigo_barras' => $this->codigo_barras,
            'status_id' => $this->status_id,
            'user_id' => $this->user_id,
            'user_deleted_id' => $this->user_deleted_id,
            'grupo_fiscal_id' => $this->grupo_fiscal_id,
            'grupo_produto_id' => $this->grupo_produto_id,
            'utilizacao' => $this->utilizacao,
            'ncm' => $this->ncm,
            'combo' => $this->combo,
            'imagem' => $this->imagem,
        ]);

        session()->flash('message', 'Produto atualizado com sucesso!');
    }

    public function cancelar()
    {
        $this->reset(); // limpa todos os campos
        session()->flash('message', 'Alterar cancelado!');
    }

    public function render()
    {
        return view('livewire.produtos.alterar');
    }
}
