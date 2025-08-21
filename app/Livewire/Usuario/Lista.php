<?php

namespace App\Livewire\Usuario;

use App\Models\User;
use Livewire\Component;

class Lista extends Component
{
    public function render()
    {
        $usuarios = User::all();

        return view('livewire.usuario.lista', [
            'usuarios' => $usuarios
        ]);
    }
}
