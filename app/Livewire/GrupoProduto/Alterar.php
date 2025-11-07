<?php

namespace App\Livewire\GrupoProduto;

use App\Models\GrupoProdutos;
use App\Models\Statues;
use Livewire\Component;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class Alterar extends Component
{
    public $nome;
    public $grupo_id;
    public $status_id;
    public $lucro;
    public $user_id;
    public $empresa_id;
    public $comissao;
    public $statuses = [];

    protected $rules = [
        'nome' => 'required|string|max:255',
        'status_id' => 'required|integer|exists:statuses,id',
        'lucro' => 'nullable|numeric|min:0',
        'comissao' => 'nullable|numeric|min:0',
    ];

    public function mount($id)
    {
        $grupo = GrupoProdutos::findOrFail($id);

        $this->grupo_id = $grupo->id;
        $this->nome = $grupo->nome;
        $this->status_id = $grupo->status_id;
        $this->lucro = number_format($grupo->lucro, 2, ',', '.');
        $this->comissao = number_format($grupo->comissao, 2, ',', '.');
        $this->user_id = $grupo->user_id;
        $this->empresa_id = $grupo->empresa_id;

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

    public function atualizar()
    {
        // Remove R$, pontos e troca vírgula por ponto
        $lucro = str_replace(['R$', '.', ' '], '', $this->lucro);
        $lucro = str_replace(',', '.', $lucro);

        $this->lucro = number_format((float) $lucro, 2, '.', '');

        $comissao = str_replace(['R$', '.', ' '], '', $this->comissao);
        $comissao = str_replace(',', '.', $comissao);
        $this->comissao = number_format((float) $comissao, 2, '.', '');

        $this->validate();

        $grupo = GrupoProdutos::find($this->grupo_id);
        
        $grupo-> nome = $this->nome;
        $grupo-> status_id = $this->status_id;
        $grupo-> lucro = $lucro;
        $grupo-> comissao = $comissao;
        $grupo-> user_id = auth()->user()->id;
        $grupo-> empresa_id = auth()->user()->empresa_id ?? 1;
        $grupo-> save();

        session()->flash('message', 'Grupo atualizado com sucesso!');
    }

    public function cancelar()
    {
        $this->reset(); // limpa todos os campos
        session()->flash('message', 'Alterar cancelado!');
    }

    public function render()
    {
        return view('livewire.grupo-produto.alterar');
    }
}
