<?php

namespace App\Livewire\GrupoDisciplina;

use App\Models\GrupoDisciplina;
use App\Models\Statues;
use Livewire\Component;

class Cadastrar extends Component
{

    public $nome;
    public $status_id;

    public $statuses = [];

    protected $rules = [
        'nome' => 'required|min:4',
        'status_id' => 'required|exists:statuses,id',
    ];

    public function salvar() {

       // $this->validate();
        
        GrupoDisciplina::create([
            'nome' => $this->nome,
            'status_id' => $this->status_id,
        ]);
        // Limpa os campos do formulário
        $this->reset(['nome', 'status_id']);
        session()->flash('message', 'Grupo Disciplina cadastrado com sucesso!');

    }

    public function mount()
    {
        $this->statuses = Statues::all();
    }

    public function render()
    {
        return view('livewire.grupo-disciplina.cadastrar');
    }
}
