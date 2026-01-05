<?php

namespace App\Livewire\Fornecedores;

use App\Models\Fornecedor as ModelsFornecedor;
use Livewire\Component;

class Fornecedor extends Component
{
    public $nome;
    public $cnpj;
    public $email;
    public $address;
    public $phone;
    public $contato;

    public $fornecedores = [];

    protected $rules = [
        'nome' => 'required|min:4',
        'cnpj' => 'nullable|min:14',
        'email' => 'nullable|email',
        'address' => 'nullable|min:5',
        'phone' => 'nullable|min:9',
        'contato' => 'nullable|min:4',
    ];

    public function mount()
    {
        $this->fornecedores = ModelsFornecedor::all();
    }

    public function salvar()
    {

        $this->validate();

        ModelsFornecedor::create([
            'nome' => $this->nome,
            'cnpj' => $this->cnpj,
            'email' => $this->email,
            'address' => $this->address,
            'phone' => $this->phone,
            'contato' => $this->contato,
        ]);

        $this->reset();

        $this->fornecedores = ModelsFornecedor::all(); // atualiza tabela
        session()->flash('message', 'Fornecedor cadastrado com sucesso!');
    }

    public function render()
    {
        return view('livewire.fornecedores.fornecedor');
    }
}
