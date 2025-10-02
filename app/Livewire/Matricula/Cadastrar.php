<?php

namespace App\Livewire\Matricula;
use App\Models\Matriculas;
use App\Models\Curso;
use App\Models\Cliente;
use App\Models\Salas;
use App\Models\Turmas;


use Livewire\Component;

class Cadastrar extends Component
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
    public $sinc;

    public $cursos = [];
    public $salas = [];
    public $turmas = [];
    public $clientes = [];

    public function mount()
    {
        $this->cursos = Curso::all(); 
        $this->salas = Salas::all();
        $this->turmas = Turmas::all();
        $this->clientes = Cliente::all();
    }

    protected $rules = [
        'empresa_id' => 'required|exists:empresas,id',
        'status_id' => 'required|exists:statuses,id',
        'cliente_id' => 'required|exists:clientes,id',
        'curso_id' => 'required|exists:cursos,id',
        'turma_id' => 'required|exists:turmas,id',
        'sala_id' => 'nullable|exists:salas,id',
        'valor' => 'required|numeric|min:0',
        'desconto' => 'nullable|numeric|min:0|max:100',
        'data_cad' => 'required|date',
        'ordem' => 'nullable|integer|min:1',
        'obs_carteira' => 'nullable|string|max:255',
        'aluno_curso' => 'nullable|string|max:255',
        'instituicao_anterior' => 'nullable|string|max:255',
        'user_id' => 'required|exists:users,id',
        'user_deleted_id' => 'nullable|exists:users,id',
        'sinc' => 'nullable|boolean',
    ];

    public function salvar() {
        // --- Formatação dos campos ---
        $this->data_cad = preg_replace('/\D/', '', $this->data_cad);

       // $this->validate();
        
        Matriculas::create([
            'empresa_id' => 1,
            'status_id' => 1,
            'cliente_id' => 1,
            'curso_id' => 1,
            'turma_id' => 1,
            'sala_id' => 1,
            'valor' => $this->valor,
            'desconto' => $this->desconto,
            'data_cad' => $this->data_cad,
            'ordem' => $this->ordem,
            'obs_carteira' => $this->obs_carteira,
            'aluno_curso' => $this->aluno_curso,
            'instituicao_anterior' => $this->instituicao_anterior,
            'user_id' => 1,
            'user_deleted_id' => $this->user_deleted_id,
            'sinc' => $this->sinc,
        ]);
        // Limpa os campos do formulário
        $this->reset();
        session()->flash('message', 'Matricula cadastrado com sucesso!');

    }

    public function render()
    {
        return view('livewire.matricula.cadastrar');
    }
}
