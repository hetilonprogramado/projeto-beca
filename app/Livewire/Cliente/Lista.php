<?php

namespace App\Livewire\Cliente;

use Livewire\Component;
use App\Models\Cliente;

class Lista extends Component
{
    public $clientes = [];
    public $pesquisa = '';

    public function mount(){
        $this->clientes = Cliente::all();
    }

    public function render(){
        return view('livewire.cliente.lista');
    }

    public function deletar($id){
        $cliente = Cliente::find($id);

        if ($cliente) {
            $cliente->delete();
            session()->flash('message', 'Cliente deletado com sucesso!');
        } else {
            session()->flash('message', 'Cliente não encontrado!');
        }
    }

    public function atualizarLista(){
        $this->clientes = Cliente::where('nome', 'like', '%' . $this->pesquisa . '%')
            ->orWhere('apelido', 'like', '%' . $this->pesquisa . '%')
            ->get();
    }

    public function updatedPesquisa(){
        $this->atualizarLista();
    }

}
