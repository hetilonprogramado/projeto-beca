<?php

namespace App\Livewire\Sala;
use Illuminate\Support\Facades\Auth;

use App\Models\Salas;
use App\Models\Statues;
use Livewire\Component;

class Cadastrar extends Component
{
    public $user_id;
    public $nome;
    public $status_id = 1;
    public $descricao;
    public $limite;
    public $user_deleted_id;
    public $statuses = [];

    public function mount()
    {
        $this->statuses = Statues::all();
    }

    protected $rules = [
        'nome' => 'required|min:4',
        'status_id' => 'required|exists:statuses,id',
        'limite' => 'required|numeric|min:1', // Minimum 1
        'user_deleted_id' => 'nullable|exists:users,id',
        'descricao' => 'nullable|string|max:255',
    ];

    public function salvar() {

       // $this->validate();
        
        Salas::create([
            'user_id' => Auth::id(),
            'empresa_id' => Auth::user()->empresa_id,
            'nome' => $this->nome,
            'status_id' => $this->status_id,
            'limite' => $this->limite,
            'descricao' => $this->descricao,
            'user_deleted_id' => $this->user_deleted_id
        ]);
        // Limpa os campos do formulário
        $this->reset();
        session()->flash('message', 'Sala cadastrado com sucesso!');

    }

    public function render()
    {
        return view('livewire.sala.cadastrar');
    }
}