<?php

namespace App\Livewire\Turma;
use App\Models\Turmas;
use App\Models\Curso;
use App\Models\Salas;
use Carbon\Carbon;

use Livewire\Component;

class Alterar extends Component
{
    public $empresa_id;
    public $turma_id;
    public $nome;
    public $curso_id;
    public $sala_id;
    public $valor;
    public $data_inicial;
    public $data_final;
    public $status_id;
    public $carga_hr;
    public $user_id;
    public $exibir_data_final;
    public $tipo_conta_id;
    public $data_encerrar_lancamento;
    public $user_deleted_id;

    protected $rules = [
        'empresa_id' => 'required|exists:empresas,id',
        'nome' => 'required|min:4',
        'curso_id' => 'required|exists:cursos,id',
        'sala_id' => 'required|exists:salas,id',
        'valor' => 'required|numeric',
        'data_inicial' => 'required|date',
        'data_final' => 'nullable|date|after_or_equal:data_inicial',
        'status_id' => 'required|exists:statuses,id',
        'carga_hr' => 'required|numeric',
        'user_id' => 'required|exists:users,id',
        'exibir_data_final' => 'boolean',
        'tipo_conta_id' => 'required|exists:tipo_contas,id',
        'data_encerrar_lancamento' => 'nullable|date|after_or_equal:data_inicial',
        'user_deleted_id' => 'nullable|exists:users,id',
        'turma_id' => 'required|exists:turmas,id',
    ];

    public $cursos = [];
    public $salas = [];

    public function mount($id)
    {
            $turma = Turmas::findOrFail($id);

        $this->turma_id = $turma->id;
        $this->nome = $turma->nome;
        $this->valor = $turma->valor;
        $this->data_inicial = $turma->data_inicial;
        $this->data_final = $turma->data_final;
        $this->carga_hr = $turma->carga_hr;
        $this->empresa_id = $turma->empresa_id;
        $this->curso_id = $turma->curso_id;
        $this->sala_id = $turma->sala_id;
        $this->status_id = $turma->status_id;
        $this->user_id = $turma->user_id;
        $this->exibir_data_final = $turma->exibir_data_final;
        $this->tipo_conta_id = $turma->tipo_conta_id;
        $this->data_encerrar_lancamento = $turma->data_encerrar_lancamento;
        $this->user_deleted_id = $turma->user_deleted_id;

        // carregar selects
        $this->cursos = Curso::all();
        $this->salas = Salas::all();
    }

    public function atualizar()
    {
        $this->validate();

        Turmas::where('id', $this->turmaId)->update([
            'empresa_id' => 1,
            'nome' => $this->nome,
            'curso_id' => 1,
            'sala_id' => 1,
            'valor' => $this->valor,
            'data_inicial' => $this->data_inicial,
            'data_final' => $this->data_final,
            'status_id' => 1,
            'carga_hr' => $this->carga_hr,
            'user_id' => 1,
            'exibir_data_final' => $this->exibir_data_final,
            'tipo_conta_id' => 1,
            'data_encerrar_lancamento' => $this->data_encerrar_lancamento,
            'user_deleted_id' => $this->user_deleted_id,
        ]);

        session()->flash('message', 'Turms atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.turma.alterar');
    }
}
