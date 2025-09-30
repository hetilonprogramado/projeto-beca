<?php

namespace App\Livewire\Produtos;

use Livewire\Component;
use App\Models\Produtos;

class Cadastrar extends Component
{
    public $empresa_id;
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

    protected function validarDados(): array{
        $rules = [
            'empresa_id' => 'required|exists:empresas,id',
            'grup_prod_id' => 'nullable|exists:grupo_produtos,id',
            'nome' => 'required|min:4',
            'vlr_compra' => 'nullable|numeric',
            'vlr_venda' => 'required|numeric',
            'estoque_minimo' => 'nullable|numeric',
            'codigo_barras' => 'nullable|min:3',
            'status_id' => 'required|exists:statuses,id',
            'user_id' => 'required|exists:users,id',
            'user_deleted_id' => 'nullable|exists:users,id',
            'grupo_fiscal_id' => 'nullable|exists:grupo_fiscais,id',
            'grupo_produto_id' => 'nullable|exists:grupo_produtos,id',
            'utilizacao' => 'nullable|min:3',
            'ncm' => 'nullable|min:3',
            'combo' => 'nullable|boolean',
            'imagem' => 'nullable|min:3',
        ];

        return $this->validate($rules);
    }

    public function salvar() {
        // --- Formatação dos campos ---
        $this->vlr_compra = str_replace(',', '.', str_replace('.', '', $this->vlr_compra));
        $this->vlr_venda = str_replace(',', '.', str_replace('.', '', $this->vlr_venda));

       // $this->validate();
        
        Produtos::create([
            'empresa_id' => 1,
            'grup_prod_id' => 1,
            'nome' => $this->nome,
            'vlr_compra' => $this->vlr_compra,
            'vlr_venda' => $this->vlr_venda,
            'estoque_minimo' => $this->estoque_minimo,
            'codigo_barras' => $this->codigo_barras,
            'status_id' => 1,
            'user_id' => 1,
            'user_deleted_id' => $this->user_deleted_id,
            'grupo_fiscal_id' => 1,
            'grupo_produto_id' => 1,
            'utilizacao' => $this->utilizacao,
            'ncm' => $this->ncm,
            'combo' => $this->combo,
            'imagem' => $this->imagem,
        ]);
        // Limpa os campos do formulário
        $this->reset();
        session()->flash('message', 'Produto cadastrado com sucesso!');

    }
    

    public function render()
    {
        return view('livewire.produtos.cadastrar');
        return view('livewire.produtos.form');
    }
}
