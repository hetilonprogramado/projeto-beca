<?php

namespace App\Livewire\GrupoDisciplina;

use App\Models\GrupoDisciplina;
use App\Models\Statues;
use Livewire\Component;

class Alterar extends Component
{
    public $nome;
    public $grupo_disciplina_id;
    public $status_id;

    public $statuses = [];

    protected $rules = [
        'nome' => 'required|min:4',
        'status_id' => 'required|exists:statuses,id',
    ];

    public function mount($id)
    {
        $grupo = GrupoDisciplina::findOrFail($id);

        $this->grupo_disciplina_id = $grupo->id;
        $this->nome = $grupo->nome;
        $this->status_id = $grupo->status_id;

        $this->statuses = Statues::all();

    }

    public function atualizar()
    {
        $this->validate();

        $grupo = GrupoDisciplina::find($this->grupo_disciplina_id);
        
        $grupo->nome = $this->nome;
        $grupo->status_id = $this->status_id;
        $grupo->save();

        session()->flash('message', 'Grupo atualizado com sucesso!');
    }

    public function cancelar()
    {
        $this->reset(); // limpa todos os campos
        session()->flash('message', 'Alterar cancelado!');
    }

    public function render()
    {
        return view('livewire.grupo-disciplina.alterar');
    }
}
