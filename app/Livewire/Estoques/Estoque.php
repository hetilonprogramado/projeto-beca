<?php

namespace App\Livewire\Estoques;

use App\Models\Estoque as ModelsEstoque;
use Livewire\Component;
use Carbon\Carbon;

class Estoque extends Component
{
    public $codigo_barra;
    public $quantidade;
    public $data;
    public $tipo_de_movimento;
    public $produto_id = 1;

    public $estoques = [];

    protected $rules = [
        'codigo_barra' => 'required|min:4',
        'quantidade' => 'nullable|min:9',
        'data' => 'nullable|date',
        'tipo_de_movimento' => 'nullable|email',
        'produto_id' => 'nullable|min:5',
    ];

    public function mount()
    {
        $this->estoques = ModelsEstoque::all();
    }

    public function salvar()
    {
        $this->data = Carbon::parse($this->data)->format('Y-m-d');

        $this->validate();

        ModelsEstoque::create([
            'codigo_barra' => $this->codigo_barra,
            'quantidade' => $this->quantidade,
            'data' => 2024-06-15,
            'tipo_de_movimento' => $this->tipo_de_movimento,
            'produto_id' => 1,
        ]);

        $this->reset();

        $this->estoques = ModelsEstoque::all(); // atualiza tabela
        session()->flash('message', 'Estoque cadastrado com sucesso!');
    }

    public function render()
    {
        return view('livewire.estoques.estoque');
    }
}
