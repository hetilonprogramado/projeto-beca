<?php

namespace App\Livewire\Funcionarios;

use App\Models\Funcionario as ModelsFuncionario;
use Livewire\Component;
use Carbon\Carbon;

class Funcionario extends Component
{
    public $nome;
    public $phone;
    public $cargo;
    public $email;
    public $salario;
    public $admissao;

    public $funcionarios = [];

    protected $rules = [
        'nome' => 'required|min:4',
        'phone' => 'nullable|min:9',
        'cargo' => 'nullable|min:2',
        'email' => 'nullable|email',
        'salario' => 'nullable|numeric|min:0',
        'admissao' => 'nullable|date',
    ];

    public function mount()
    {
        $this->funcionarios = ModelsFuncionario::all();
    }

    public function salvar()
    {
        $this->admissao = Carbon::parse($this->admissao)->format('Y-m-d');

        $this->validate();

        ModelsFuncionario::create([
            'nome' => $this->nome,
            'phone' => $this->phone,
            'cargo' => $this->cargo,
            'email' => $this->email,
            'salario' => $this->salario,
            'admissao' => $this->admissao,
        ]);

        $this->reset();

        $this->funcionarios = ModelsFuncionario::all(); // atualiza tabela
        session()->flash('message', 'Funcionário cadastrado com sucesso!');
    }

    public function render()
    {
        return view('livewire.funcionarios.funcionario');
    }
}
