<?php

namespace App\Livewire\Empresa;

use App\Models\Empresa;
use Livewire\Component;

class Lista extends Component
{
    public function deletar($id)
    {
        $empresa = Empresa::find($id);

        if ($empresa) {
            $empresa->delete();
            session()->flash('message', 'Empresa deletado com sucesso!');
        } else {
            session()->flash('message', 'Empresa não encontrado!');
        }
    }

    public function render()
    {
        $empresas = Empresa::all();

        return view('livewire.empresa.lista', [
            'empresas' => $empresas
        ]);
    }
}
