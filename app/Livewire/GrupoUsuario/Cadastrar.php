<?php

namespace App\Livewire\GrupoUsuario;

use App\Models\GrupoUsuarios;
use Livewire\Component;

class Cadastrar extends Component
{
    public $nome;
    public $data_inicial;
    public $status_id;
    public $user_id;

    protected function validarDados(): array{
        $rules = [
            'nome' => 'required|min:4',
            'data_inicial' => 'required|date',
            'status_id' => 'required|exists:statuses,id',
            'user_id' => 'required|exists:users,id',
        ];

        return $this->validate($rules);
    }

    public function salvar() {

       // $this->validate();
        
        GrupoUsuarios::create([
            'nome' => $this->nome,
            'status_id' => 1,
            'data_inicial' => $this->data_inicial,
            'user_id' => Auth()->user()->id,
        ]);
        // Limpa os campos do formulário
        $this->reset();
        session()->flash('message', 'Grupo cadastrado com sucesso!');

    }

    public function render()
    {
        return view('livewire.grupo-usuario.cadastrar');
    }
}
