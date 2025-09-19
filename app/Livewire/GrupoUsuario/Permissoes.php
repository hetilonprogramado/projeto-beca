<?php

namespace App\Livewire\GrupoUsuario;

use Livewire\Component;

class Permissoes extends Component
{
    public $modulosAbertos = [];

    // alterna abrir/fechar módulo
    public function toggleModulo($modulo)
    {
        if (in_array($modulo, $this->modulosAbertos)) {
            // se já está aberto, remove da lista (fecha)
            $this->modulosAbertos = array_diff($this->modulosAbertos, [$modulo]);
        } else {
            // se está fechado, adiciona à lista (abre)
            $this->modulosAbertos[] = $modulo;
        }
    }

    public function render()
    {
        return view('livewire.grupo-usuario.permissoes');
    }
}
