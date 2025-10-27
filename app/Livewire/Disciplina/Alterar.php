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
        'status_id' => 'required|exists:statuses,id', // <-- corrigido
        'grupo_disciplina_id' => 'required|exists:grupos_disciplinas,id', // <-- corrigido nome da tabela
        'user_deleted_id' => 'nullable|exists:users,id',
    ];

    public function mount($id)
    {
        $disciplina = Disciplina::findOrFail($id);

        // guarda o ID
        $this->disciplina_id = $disciplina->id;

        // preenche os campos
        $this->nome = $disciplina->nome;
        $this->empresa_id = $disciplina->empresa_id;
        $this->sigla = $disciplina->sigla;
        $this->hrs_aula = $disciplina->hrs_aula;
        $this->status_id = $disciplina->status_id;
        $this->grupo_disciplina_id = $disciplina->grupo_disciplina_id;
        $this->user_deleted_id = $disciplina->user_deleted_id;

        // carrega opções de selects
        $this->statuses = Statues::all();
        $this->grupo_disciplinas = GrupoDisciplina::all();
    }

    public function atualizar()
    {
        $this->validate();

        $disciplina = Disciplina::find($this->disciplina_id);


        $disciplina -> nome = $this->nome;
        $disciplina -> empresa_id = Auth()->user()->empresa_id ?? 1;
        $disciplina -> sigla = $this->sigla;
        $disciplina -> hrs_aula = $this->hrs_aula;
        $disciplina -> status_id = $this->status_id;
        $disciplina -> grupo_disciplina_id = $this->grupo_disciplina_id;
        $disciplina -> user_deleted_id = $this->user_deleted_id;
        $disciplina -> user_id = Auth()->user()->id;
        $disciplina->save();

        session()->flash('message', 'Disciplina atualizada com sucesso!');
    }

    public function render()
    {
        return view('livewire.disciplina.alterar');
    }
}
