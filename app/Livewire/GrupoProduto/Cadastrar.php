<?php

namespace App\Livewire\GrupoProduto;

use App\Models\GrupoProdutos;
use App\Models\Statues;
use Livewire\Component;

class Cadastrar extends Component
{
    public $nome;
    public $status_id = 1;
    public $lucro;
    public $user_id;
    public $empresa_id;
    public $comissao;
    public $statuses = [];

    public function mount()
    {
        $this->statuses = Statues::all();
    }

    public function formatarValor($campo)
    {
        if (!property_exists($this, $campo)) {
            return;
        }

        $lucro = trim($this->$campo ?? '');

        // Remove "R$", espaços e pontos de milhar
        $lucro = str_replace(['R$', ' ', '.'], '', $lucro);

        // Substitui vírgula por ponto para tratar como número
        $lucro = str_replace(',', '.', $lucro);

        // Se não for número, ignora
        if (!is_numeric($lucro)) {
            $this->$campo = '0,00';
            return;
        }

        // Converte para float e formata no padrão brasileiro
        $valorFormatado = number_format((float) $lucro, 2, ',', '.');

        // Atualiza o campo
        $this->$campo = $valorFormatado;
    }

    protected function validarDados(): array{
        $rules = [
            'nome' => 'required|min:4',
            'status_id' => 'required|exists:statuses,id',
            'lucro' => 'nullable|numeric',
            'user_id' => 'required|exists:users,id',
            'empresa_id' => 'required|exists:empresas,id',
            'comissao' => 'nullable|numeric',
        ];

        return $this->validate($rules);
    }

    public function salvar() {

       // $this->validate();

       // Remove R$, pontos e troca vírgula por ponto
        $lucro = str_replace(['R$', '.', ' '], '', $this->lucro);
        $lucro = str_replace(',', '.', $lucro);

        $this->lucro = number_format((float) $lucro, 2, '.', '');

        $comissao = str_replace(['R$', '.', ' '], '', $this->comissao);
        $comissao = str_replace(',', '.', $comissao);
        $this->comissao = number_format((float) $comissao, 2, '.', '');
        
        GrupoProdutos::create([
            'nome' => $this->nome,
            'status_id' =>  $this->status_id,
            'lucro' => $lucro,
            'user_id' => Auth()->user()->id,
            'empresa_id' => Auth()->user()->empresa_id,
            'comissao' => $comissao,
        ]);
        // Limpa os campos do formulário
        $this->reset();
        session()->flash('message', 'Grupo cadastrado com sucesso!');

    }

    public function render()
    {
        return view('livewire.grupo-produto.cadastrar');
    }
}
