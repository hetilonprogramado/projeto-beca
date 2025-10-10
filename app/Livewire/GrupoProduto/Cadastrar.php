<?php

namespace App\Livewire\GrupoProduto;

use App\Models\GrupoProdutos;
use App\Models\Statues;
use Livewire\Component;

class Cadastrar extends Component
{
    public $nome;
    public $status_id;
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
        // Remove tudo que não for número
        $valor = preg_replace('/[^\d]/', '', $this->$campo);

        if ($valor === '' || $valor === null) {
            $this->$campo = '0,00';
            return;
        }

        // Converte para float (divide os centavos)
        $valor = number_format($valor / 100, 2, ',', '.');

        // Atualiza o campo formatado
        $this->$campo = $valor;
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

       $lucro = $this->lucro;
       $comissao = $this->comissao;

       // Remove R$, pontos e troca vírgula por ponto
       $lucro = str_replace(['R$', '.', ' '], '', $lucro);
       $lucro = str_replace(',', '.', $lucro);

       $comissao = str_replace(['R$', '.', ' '], '', $comissao);
       $comissao = str_replace(',', '.', $comissao);
        
        GrupoProdutos::create([
            'nome' => $this->nome,
            'status_id' => 1,
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
