<?php

namespace App\Livewire\Matricula;
use App\Models\Matriculas;


use Livewire\Component;

class Cadastrar extends Component
{
    public $empresa_id;
    public $status_id;
    public $cliente_id;
    public $responsavel_id;
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
    public $ano_letivo;
    public $user_deleted_id;

    protected $rules = [
        'empresa_id' => 'required|exists:empresas,id',
        'status_id' => 'required|exists:statuses,id',
        'cliente_id' => 'required|exists:clientes,id',
        'responsavel_id' => 'nullable|exists:responsaveis,id',
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
        'ano_letivo' => 'required|integer|min:2000|max:',
        'user_deleted_id' => 'nullable|exists:users,id'
    ];

    public function salvar() {
        // --- Formatação dos campos ---
        $this->data_cad = preg_replace('/\D/', '', $this->data_cad);

       // $this->validate();
        
        Matriculas::create([
            'empresa_id' => $this->empresa_id,
            'status_id' => $this->status_id,
            'cliente_id' => $this->cliente_id,
            'responsavel_id' => $this->responsavel_id,
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
            'user_id' => 1,
            'ano_letivo' => $this->ano_letivo,
            'user_deleted_id' => $this->user_deleted_id
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
