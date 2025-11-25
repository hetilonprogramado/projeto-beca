<?php

namespace App\Livewire\GrupoUsuario;

use App\Models\GrupoUsuarios;
use App\Models\Statues;
use Livewire\Component;

class Cadastrar extends Component
{
    public $nome;
    public $status_id = 1;
    public $user_id;
    public $statuses = [];

    public function mount()
    {
        $this->statuses = Statues::all();
    }

    protected function validarDados(): array{
        $rules = [
            'nome' => 'required|min:4',
            'status_id' => 'required|exists:statuses,id',
            'user_id' => 'required|exists:users,id',
        ];

        return $this->validate($rules);
    }

    public function salvar() {

       // $this->validate();
        
        GrupoUsuarios::create([
            'nome' => $this->nome,
            'status_id' => $this->status_id,
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
