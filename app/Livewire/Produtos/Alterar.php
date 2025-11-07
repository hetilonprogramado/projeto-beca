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
        'nome' => 'required|string|max:255',
        'vlr_compra' => 'nullable|numeric',
        'vlr_venda' => 'nullable|numeric',
        'estoque_minimo' => 'nullable|integer',
        'codigo_barras' => 'nullable|string|max:100',
        'status_id' => 'required|exists:statuses,id',
        'utilizacao' => 'nullable|string|max:255',
        'ncm' => 'nullable|string|max:20',
        'combo' => 'nullable|boolean',
        'imagem' => 'nullable|string|max:255',
        'user_deleted_id' => 'nullable|exists:users,id',
        'grupo_fiscal_id' => 'nullable|integer',
        'grupo_produto_id' => 'nullable|integer',
    ];

    public function mount($id)
    {
        $produto = Produtos::findOrFail($id);

        $this->produto_id = $produto->id;
        $this->nome = $produto->nome;
        $this->codigo_barras = $produto->codigo_barras;
        $this->status_id = $produto->status_id;
        $this->user_deleted_id = $produto->user_deleted_id;
        $this->user_id = $produto->user_id;
        $this->empresa_id = $produto->empresa_id;
        $this->estoque_minimo = $produto->estoque_minimo;
        $this->grupo_fiscal_id = $produto->grupo_fiscal_id;
        $this->grupo_produto_id = $produto->grupo_produto_id;
        $this->utilizacao = $produto->utilizacao;
        $this->vlr_compra = number_format($produto->vlr_compra, 2, ',', '.');;
        $this->vlr_venda = number_format($produto->vlr_venda, 2, ',', '.');;
        $this->ncm = $produto->ncm;
        $this->combo = $produto->combo;
        $this->imagem = $produto->imagem;
        $this->grup_prod_id = $produto->grup_prod_id;

        $this->statuses = Statues::all();
        $this->grupos = GrupoProdutos::all();

    }

    public function formatarValor($campo)
    {
        if (!property_exists($this, $campo)) {
            return;
        }

        $vlr_compra = trim($this->$campo ?? '');

        // Remove "R$", espaços e pontos de milhar
        $vlr_compra = str_replace(['R$', ' ', '.'], '', $vlr_compra);

        // Substitui vírgula por ponto para tratar como número
        $vlr_compra = str_replace(',', '.', $vlr_compra);

        // Se não for número, ignora
        if (!is_numeric($vlr_compra)) {
            $this->$campo = '0,00';
            return;
        }

        // Converte para float e formata no padrão brasileiro
        $valorFormatado = number_format((float) $vlr_compra, 2, ',', '.');

        // Atualiza o campo
        $this->$campo = $valorFormatado;
    }

    public function atualizar()
    {
        // Remove R$, pontos e troca vírgula por ponto
        $vlr_compra = str_replace(['R$', '.', ' '], '', $this->vlr_compra);
        $vlr_compra = str_replace(',', '.', $vlr_compra);

        $this->vlr_compra = number_format((float) $vlr_compra, 2, '.', '');

        $vlr_venda = str_replace(['R$', '.', ' '], '', $this->vlr_venda);
        $vlr_venda = str_replace(',', '.', $vlr_venda);
        $this->vlr_venda = number_format((float) $vlr_venda, 2, '.', '');


        $this->validate();

        $produto = Produtos::find($this->produto_id);
        
        $produto-> nome = $this->nome;
        $produto-> codigo_barras = $this->codigo_barras;
        $produto-> status_id = $this->status_id;
        $produto-> user_deleted_id = $this->user_deleted_id;
        $produto-> user_id = Auth()->user()->id;
        $produto-> empresa_id = $this->empresa_id;
        $produto-> estoque_minimo = $this->estoque_minimo;
        $produto-> grupo_fiscal_id = $this->grupo_fiscal_id;
        $produto-> grupo_produto_id = $this->grupo_produto_id;
        $produto-> utilizacao = $this->utilizacao;
        $produto-> vlr_compra = $vlr_compra;
        $produto-> vlr_venda = $vlr_venda;
        $produto-> ncm = $this->ncm;
        $produto-> combo = $this->combo;    
        $produto-> imagem = $this->imagem;
        $produto-> grup_prod_id = $this->grup_prod_id;
        $produto-> save();

        session()->flash('message', 'Produtos atualizado com sucesso!');
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
