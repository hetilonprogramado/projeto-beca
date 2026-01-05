<?php

namespace App\Livewire\Clientes;

use Livewire\Component;
use App\Models\Cliente as ClienteModel;
use Carbon\Carbon;

class Cliente extends Component
{
    public $nome;
    public $phone;
    public $email;
    public $address;
    public $data_nasc;
    public $prospeccao;

    public $clients = [];

    protected $rules = [
        'nome' => 'required|min:4',
        'phone' => 'nullable|min:9',
        'email' => 'nullable|email',
        'address' => 'nullable|min:5',
        'data_nasc' => 'nullable|date',
        'prospeccao' => 'nullable|date',
    ];

    public function mount()
    {
        $this->clients = ClienteModel::all();
    }

    public function salvar()
    {
        $this->data_nasc = Carbon::parse($this->data_nasc)->format('Y-m-d');
        $this->prospeccao = Carbon::parse($this->prospeccao)->format('Y-m-d');

        $this->validate();

        ClienteModel::create([
            'nome' => $this->nome,
            'phone' => $this->phone,
            'email' => $this->email,
            'address' => $this->address,
            'data_nasc' => $this->data_nasc,
            'prospeccao' => $this->prospeccao,
        ]);

        $this->reset();

        $this->clients = ClienteModel::all(); // atualiza tabela
        session()->flash('message', 'Cliente cadastrado com sucesso!');
    }

    public function render()
    {
        return view('livewire.clientes.cliente');
    }
}
