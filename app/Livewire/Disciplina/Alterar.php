<?php

namespace App\Livewire\Disciplina;

use App\Models\Disciplina;
use App\Models\GrupoDisciplina;
use App\Models\Statues;
use Livewire\Component;

class Alterar extends Component
{
    public $nome;
    public $disciplina_id;
    public $empresa_id;
    public $sigla;
    public $hrs_aula;
    public $status_id;
    public $grupo_disciplina_id;
    public $user_id;
    public $user_deleted_id;

    public $statuses = [];
    public $grupo_disciplinas = [];

    protected $rules = [
        'nome' => 'required|min:4',
        'empresa_id' => 'required|exists:empresas,id',
        'sigla' => 'required|min:2|max:10',
        'hrs_aula' => 'required|numeric|min:1',
        'status_id' => 'required|exists:statuses,id',
        'grupo_disciplina_id' => 'required|exists:grupo_disciplinas,id',
        'user_deleted_id' => 'nullable|exists:users,id',
    ];

    public function mount($id)
    {
        $disciplina = Disciplina::findOrFail($id);

        $this->nome = $disciplina->nome;
        $this->empresa_id = $disciplina->empresa_id;
        $this->sigla = $disciplina->sigla;
        $this->hrs_aula = $disciplina->hrs_aula;
        $this->status_id = $disciplina->status_id;
        $this->grupo_disciplina_id = $disciplina->grupo_disciplina_id;
        $this->user_deleted_id = $disciplina->user_deleted_id;
        $this->statuses = Statues::all();
        $this->grupo_disciplinas = GrupoDisciplina::all();
    }

    public function atualizar()
    {
        $this->validate();

        Disciplina::where('id', $this->disciplina_id)->update([
            'nome' => $this->nome,
            'empresa_id' => $this->empresa_id,
            'sigla' => $this->sigla,
            'hrs_aula' => $this->hrs_aula,
            'status_id' => $this->status_id,
            'grupo_disciplina_id' => $this->grupo_disciplina_id,
            'user_deleted_id' => $this->user_deleted_id
        ]);

        session()->flash('message', 'Disciplina atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.disciplina.alterar');
    }
}
