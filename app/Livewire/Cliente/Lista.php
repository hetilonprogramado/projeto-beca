<?php

namespace App\Livewire\Cliente;

use Livewire\Component;
use App\Models\Cliente;

class Lista extends Component
{
    public function deletar($id)
    {
        $cliente = Cliente::find($id);

        if ($cliente) {
            $cliente->delete();
            session()->flash('message', 'Cliente deletado com sucesso!');
        } else {
            session()->flash('message', 'Cliente não encontrado!');
        }
    }

    public function render()
    {
        // Busca todos os clientes do banco
        $clientes = Cliente::all();

        return view('livewire.cliente.lista',[
            'clientes' => $clientes
        ]);
    }
    
}
