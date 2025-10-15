<?php

namespace App\Livewire\Curso;

use App\Models\Curso;
use Carbon\Carbon;
use App\Models\Niveis;
use App\Models\Statues;
use Livewire\Component;

class Cadastrar extends Component
{
    public $user_id;
    public $nome;
    public $status_id;
    public $tipo_lancamento;
    public $hora_aula;
    public $extracurricular;
    public $nivel_id;
    public $niveis;
    public $descricao;
    public $user_deleted_id;
    public $statuses = [];

    protected $rules = [
        'nome' => 'required|min:4',
        'status_id' => 'required|exists:statuses,id',
        'tipo_lancamento' => 'required|in:Mensal,Anual', // Mensal ou Anual
        'hora_aula' => 'required|numeric|min:1', // Minimum 1
        'extracurricular' => 'required|in:Sim,Nao', // Sim ou Nao
        'nivel_id' => 'required|exists:niveis,id',
        'descricao' => 'nullable|string|max:1000',
        'user_deleted_id' => 'nullable|exists:users,id',
    ];

    public function salvar() {

       // $this->validate();
        
        Curso::create([
            'user_id' => 1,
            'nome' => $this->nome,
            'status_id' => $this->status_id,
            'tipo_lancamento' => $this->tipo_lancamento,
            'hora_aula' => $this->hora_aula,
            'extracurricular' => $this->extracurricular,
            'nivel_id' => $this->nivel_id,
            'descricao' => $this->descricao,
            'user_deleted_id' => $this->user_deleted_id
        ]);
        // Limpa os campos do formulário
        $this->reset(['nome', 'status_id', 'tipo_lancamento', 'hora_aula', 'extracurricular', 'descricao', 'user_deleted_id']);
        session()->flash('message', 'Curso cadastrado com sucesso!');

    }

    public function mount()
    {
        $this->niveis = Niveis::all(); // carrega todos os níveis
        $this->statuses = Statues::all();
    }

    public function render()
    {
        return view('livewire.curso.cadastrar');

        return view('livewire.curso.form');
    }
}
