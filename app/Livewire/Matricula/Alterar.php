<?php

namespace App\Livewire\Matricula;

use App\Models\Cliente;
use App\Models\Curso;
use App\Models\Matriculas;
use App\Models\Salas;
use App\Models\Statues;
use App\Models\Turmas;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Alterar extends Component
{
    public $empresa_id;
    public $matricula_id;
    public $status_id;
    public $cliente_id;
    public $curso_id;
    public $turma_id;
    public $sala_id;
    public $valor;
    public $desconto;
    public $data_cad;
    public $ordem;
    public $obs_carteira;
    public $aluno_curso;
    public $instituicao_anterior;
    public $user_id;
    public $user_deleted_id;
    public $sinc;

    public $cursos = [];
    public $salas = [];
    public $turmas = [];
    public $clientes = [];
    public $statuses = [];

    protected $rules = [
        'cliente_id' => 'required|integer',
        'curso_id' => 'required|integer',
        'turma_id' => 'required|integer',
        'sala_id' => 'required|integer',
        'valor' => 'required|numeric',
        'desconto' => 'nullable|numeric',
        'data_cad' => 'required|date',
        'ordem' => 'nullable|string|max:255',
        'obs_carteira' => 'nullable|string',
        'aluno_curso' => 'nullable|string|max:255',
        'instituicao_anterior' => 'nullable|string|max:255',
        'user_deleted_id' => 'nullable|integer',
        'sinc' => 'nullable|boolean',
        'empresa_id' => 'required|integer',
        'user_id' => 'required|integer',
        'status_id' => 'required|integer|exists:statuses,id',
    ];

    public function mount($id)
    {
        $matricula = Matriculas::findOrFail($id);

        $this->matricula_id = $matricula->id;
        $this->empresa_id = $matricula->empresa_id;
        $this->status_id = $matricula->status_id;
        $this->cliente_id = $matricula->cliente_id;
        $this->curso_id = $matricula->curso_id;
        $this->turma_id = $matricula->turma_id;
        $this->sala_id = $matricula->sala_id;
        $this->valor = $matricula->valor;
        $this->desconto = $matricula->desconto;
        $this->data_cad = $matricula->data_cad;
        $this->ordem = $matricula->ordem;
        $this->obs_carteira = $matricula->obs_carteira;
        $this->aluno_curso = $matricula->aluno_curso;
        $this->instituicao_anterior = $matricula->instituicao_anterior;
        $this->user_id = $matricula->user_id;
        $this->user_deleted_id = $matricula->user_deleted_id;
        $this->sinc = $matricula->sinc;
        
        $this->statuses = Statues::all();
        $this->clientes = Cliente::all();
        $this->cursos = Curso::all();
        $this->turmas = Turmas::all();
        $this->salas = Salas::all();

    }

    public function atualizar()
    {
        $this->validate();

        $matricula = Matriculas::find($this->matricula_id);
        
        $matricula->status_id = $this->status_id;
        $matricula->cliente_id = $this->cliente_id;
        $matricula->curso_id = $this->curso_id;
        $matricula->turma_id = $this->turma_id;
        $matricula->sala_id = $this->sala_id;
        $matricula->valor = $this->valor;
        $matricula->desconto = $this->desconto;
        $matricula->data_cad = $this->data_cad;
        $matricula->ordem = $this->ordem;
        $matricula->obs_carteira = $this->obs_carteira;
        $matricula->aluno_curso = $this->aluno_curso;
        $matricula->instituicao_anterior = $this->instituicao_anterior;
        $matricula->user_deleted_id = $this->user_deleted_id;
        $matricula->sinc = $this->sinc;
        $matricula->user_id = Auth()->user()->id;
        $matricula->empresa_id = Auth()->user()->empresa_id ?? 1;
        $matricula->save();

        session()->flash('message', 'Matricula atualizado com sucesso!');
    }

    public function cancelar()
    {
        $this->reset(); // limpa todos os campos
        session()->flash('message', 'Alterar cancelado!');
    }

    public function render()
    {
        return view('livewire.matricula.alterar', [
            'statuses' => $this->statuses,
            'clientes' => $this->clientes,
            'cursos' => $this->cursos,
            'turmas' => $this->turmas,
            'salas' => $this->salas,
        ]);
    }
}
