<?php

namespace App\Livewire\Clientes;

use Livewire\Component;
use App\Models\Cliente as ClienteModel;
use Carbon\Carbon;

class Cliente extends Component
{
    public $nome;
    public $telefone;
    public $email;
    public $endereco;
    public $data_nasc;
    public $prospeccao; // precisa existir
    public $showCard = false;

    public function salvarCliente()
    {
        $this->validate([
            'nome' => 'required|min:4',
            'telefone' => 'nullable|min:9',
            'email' => 'nullable|email',
            'endereco' => 'nullable|min:3',
            'data_nasc' => 'nullable|date',
            'prospeccao' => 'nullable|date',
        ]);

        ClienteModel::create([
            'nome' => $this->nome,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'endereco' => $this->endereco,
            'data_nasc' => $this->data_nasc ? Carbon::parse($this->data_nasc)->format('Y-m-d') : null,
            'prospeccao' => $this->prospeccao ? Carbon::parse($this->prospeccao)->format('Y-m-d') : null,
        ]);

        $this->reset(['nome','telefone','email','endereco','data_nasc','prospeccao']);
        $this->showCard = false;

        session()->flash('message', 'Cliente cadastrado com sucesso!');
    }

    public function render()
    {
        return view('livewire.clientes.cliente', [
            'clients' => ClienteModel::all()
        ]);
    }
}
