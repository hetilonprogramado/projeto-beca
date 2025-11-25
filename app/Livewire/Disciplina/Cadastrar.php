<?php

namespace App\Livewire\Disciplina;

use App\Models\Disciplina;
use App\Models\GrupoDisciplina;
use App\Models\Statues;
use Livewire\Component;

class Cadastrar extends Component
{
    public $nome;
    public $empresa_id;
    public $sigla;
    public $hrs_aula;
    public $status_id = 1;
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

    public function salvar() {

       // $this->validate();
        
        Disciplina::create([
            'user_id' => 1,
            'nome' => $this->nome,
            'empresa_id' => 1,
            'sigla' => $this->sigla,
            'hrs_aula' => $this->hrs_aula,
            'status_id' => $this->status_id,
            'grupo_disciplina_id' => $this->grupo_disciplina_id,
            'user_deleted_id' => $this->user_deleted_id
        ]);
        // Limpa os campos do formulário
        $this->reset(['nome', 'empresa_id', 'sigla', 'hrs_aula', 'status_id', 'grupo_disciplina_id', 'user_deleted_id']);
        session()->flash('message', 'Disciplina cadastrado com sucesso!');

    }

    public function mount()
    {
        $this->statuses = Statues::all();
        $this->grupo_disciplinas = GrupoDisciplina::all();
    }

    public function render()
    {
        return view('livewire.disciplina.cadastrar');
    }
}
