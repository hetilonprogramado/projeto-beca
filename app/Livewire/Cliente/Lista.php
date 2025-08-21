<?php

namespace App\Livewire\Cliente;

use Livewire\Component;
use App\Models\Cliente;

class Lista extends Component
{
    public function render()
    {
        // Busca todos os clientes do banco
        $clientes = Cliente::all();

        return view('livewire.cliente.lista',[
            'clientes' => $clientes
        ]);
    }
    
}
