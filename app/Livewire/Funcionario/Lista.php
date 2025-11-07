<?php

namespace App\Livewire\Funcionario;

use App\Models\Funcionario;
use Livewire\Component;

class Lista extends Component
{
    public function deletar($id)
    {
        $funcionario = Funcionario::find($id);

        if ($funcionario) {
            $funcionario->delete();
            session()->flash('message', 'Funcionario deletado com sucesso!');
        } else {
            session()->flash('message', 'Funcionario não encontrado!');
        }
    }

    public function render()
    {
        $funcionarios = Funcionario::all();

        return view('livewire.funcionario.lista', [
            'funcionarios' => $funcionarios
        ]);
    }
}
