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
        if (!property_exists($this, $campo)) {
            return;
        }

        $valor = trim($this->$campo ?? '');

        // Remove R$ e espaços
        $valor = str_replace(['R$', ' '], '', $valor);

        // Se o campo estiver vazio
        if ($valor === '' || $valor === null) {
            $this->$campo = '0,00';
            return;
        }

        // Substitui ponto por nada e vírgula por ponto apenas para checar se é número
        $numeroVerificado = str_replace(['.', ','], ['', '.'], $valor);

        // Se não for número, apenas retorna sem mudar
        if (!is_numeric($numeroVerificado)) {
            return;
        }

        // Verifica se já tem vírgula (decimal)
        if (!str_contains($valor, ',')) {
            // Se não tem vírgula, adiciona ,00
            $valor .= ',00';
        }

        // Remove zeros à esquerda desnecessários
        $valor = ltrim($valor, '0');
        if ($valor === '' || $valor[0] === ',') {
            $valor = '0' . $valor;
        }

        // Atualiza o campo
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
