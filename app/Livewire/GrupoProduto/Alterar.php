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
        'nome' => 'required|min:4',
        'status_id' => 'required|exists:statuses,id',
        'lucro' => 'required|numeric',
        'user_id' => 'required|exists:users,id',
        'empresa_id' => 'required|exists:empresas,id',
        'comissao' => 'required|numeric',
    ];

    public function mount($id)
    {
        $grupo = GrupoProdutos::findOrFail($id);

        $this->nome = $grupo->nome;
        $this->grupo_id = $grupo->id;
        $this->lucro = $grupo->lucro;
        $this->comissao = $grupo->comissao;
        $this->empresa_id = $grupo->empresa_id;
        $this->status_id = $grupo->status_id;
        $this->user_id = $grupo->user_id;

        $this->statuses = Statues::all();
    }

    public function atualizar()
    {
        $this->validate();

        GrupoProdutos::where('id', $this->grupoId)->update([
            'nome' => $this->nome,
            'lucro' => $this->lucro,
            'comissao' => $this->comissao,
            'empresa_id' => $this->empresa_id,
            'status_id' => $this->status_id,
            'user_id' => $this->user_id,
        ]);

        session()->flash('message', 'Grupo atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.grupo-produto.alterar');
    }
}
