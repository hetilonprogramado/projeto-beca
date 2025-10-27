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
        $this->lucro = $grupo->lucro;
        $this->comissao = $grupo->comissao;
        $this->user_id = $grupo->user_id;
        $this->empresa_id = $grupo->empresa_id;

        $this->statuses = Statues::all();
    }

    public function atualizar()
    {
        $this->validate();

        $grupo = GrupoProdutos::find($this->grupo_id);
        
        $grupo-> nome = $this->nome;
        $grupo-> status_id = $this->status_id;
        $grupo-> lucro = $this->lucro;
        $grupo-> comissao = $this->comissao;
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
