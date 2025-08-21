<?php

namespace App\Livewire\Empresa;

use App\Models\Empresa;
use Livewire\Component;

class Lista extends Component
{
    public function render()
    {
        $empresas = Empresa::all();

        return view('livewire.empresa.lista', [
            'empresas' => $empresas
        ]);
    }
}
