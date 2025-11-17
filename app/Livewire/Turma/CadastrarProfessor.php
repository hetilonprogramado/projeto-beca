<?php

namespace App\Livewire\Turma;

use App\Models\Funcionario;
use App\Models\TurmaDisciplina;
use App\Models\Turmas;
use Livewire\Component;

class CadastrarProfessor extends Component
{
    public $turmas = [];
    public $funcionarios;
    public $turmaDiciplinas = [];

    public $empresa_id;
    public $turma_id;
    public $disciplina_id;
    public $funcionario_id;
    public $user_id;
    public $user_deleted_id;
    public $sinc;

    protected $rules = [
        'empresa_id' => 'required',
        'turma_id' => 'required',
        'disciplina_id' => 'required',
        'funcionario_id' => 'required',
        'user_id' => 'nullable',
        'user_deleted_id' => 'nullable',
        'sinc' => 'nullable',
    ];

    public function adicionarProfessor($funcionarioId)
    {
        $empresaId = auth()->user()->empresa_id;

        $existe = TurmaDisciplina::where('turma_id', $this->turma_id)
            ->where('disciplina_id', $this->disciplina_id)
            ->where('funcionario_id', $funcionarioId)
            ->exists();

        if ($existe) {
            session()->flash('error', 'Esse professor já foi adicionado nessa turma/disciplina.');
            return;
        }

        TurmaDisciplina::create([
            'empresa_id' => $empresaId,
            'turma_id' => $this->turma_id,
            'disciplina_id' => $this->disciplina_id,
            'funcionario_id' => $funcionarioId,
            'user_id' => auth()->id(),
            'sinc' => 'sim',
        ]);

        session()->flash('message', 'Professor adicionado com sucesso!');
        $this->turmaDiciplinas = TurmaDisciplina::all();
    }

    public function mount()
    {
        $this->empresa_id = auth()->user()->empresa_id ?? 1;
        $this->turmas = Turmas::all();
        $this->funcionarios = Funcionario::all();
        $this->turmaDiciplinas = TurmaDisciplina::all();
    }

    public function render()
    {
        return view('livewire.turma.cadastrar-professor', [
            'turmas' => $this->turmas,
            'funcionarios' => $this->funcionarios,
            'turmaDiciplinas' => $this->turmaDiciplinas,
        ]);
    }
}
