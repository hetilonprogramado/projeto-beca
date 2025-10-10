<?php

namespace App\Livewire\Matricula;

use App\Models\Cliente;
use App\Models\Curso;
use App\Models\Matriculas;
use App\Models\Salas;
use App\Models\Statues;
use App\Models\Turmas;
use GuzzleHttp\Client;
use Livewire\Component;

class Alterar extends Component
{
    public $empresa_id;
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
    public $grupoId;
    public $sinc;

    public $cursos = [];
    public $salas = [];
    public $turmas = [];
    public $clientes = [];
    public $statuses = [];

    protected $rules = [
        'empresa_id' => 'required|exists:empresas,id',
        'status_id' => 'required|exists:statuses,id',
        'cliente_id' => 'required|exists:clientes,id',
        'curso_id' => 'required|exists:cursos,id',
        'turma_id' => 'required|exists:turmas,id',
        'sala_id' => 'required|exists:salas,id',
        'valor' => 'required|numeric',
        'desconto' => 'nullable|numeric',
        'data_cad' => 'required|date',
        'ordem' => 'nullable|string',
        'obs_carteira' => 'nullable|string',
        'aluno_curso' => 'nullable|string',
        'instituicao_anterior' => 'nullable|string',
        'user_id' => 'required|exists:users,id',
        'user_deleted_id' => 'nullable|exists:users,id',
        'sinc' => 'nullable|boolean',
    ];

    public function mount($id)
    {
        $matricula = Matriculas::findOrFail($id);

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
        $this->grupoId = $matricula->id;

        $this->cursos = Curso::all(); 
        $this->salas = Salas::all();
        $this->turmas = Turmas::all();
        $this->clientes = Cliente::all();
        $this->statuses = Statues::all();
    }

    public function atualizar()
    {
        $this->validate();

        Matriculas::where('id', $this->grupoId)->update([
            'empresa_id' => $this->empresa_id,
            'status_id' => $this->status_id,
            'cliente_id' => $this->cliente_id,
            'curso_id' => $this->curso_id,
            'turma_id' => $this->turma_id,
            'sala_id' => $this->sala_id,
            'valor' => $this->valor,
            'desconto' => $this->desconto,
            'data_cad' => $this->data_cad,
            'ordem' => $this->ordem,
            'obs_carteira' => $this->obs_carteira,
            'aluno_curso' => $this->aluno_curso,
            'instituicao_anterior' => $this->instituicao_anterior,
            'user_id' => $this->user_id,
            'user_deleted_id' => $this->user_deleted_id,
            'sinc' => $this->sinc,
        ]);

        session()->flash('message', 'Grupo atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.matricula.alterar');
    }
}
