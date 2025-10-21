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

        $this->nome = $grupo->nome;
        $this->status_id = $grupo->status_id;
        $this->statuses = Statues::all();
    }

    public function atualizar()
    {
        $this->validate();

        GrupoDisciplina::where('id', $this->grupo_disciplina_id)->update([
            'nome' => $this->nome,
            'status_id' => $this->status_id,
        ]);

        session()->flash('message', 'Grupo Disciplina atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.grupo-disciplina.alterar');
    }
}
