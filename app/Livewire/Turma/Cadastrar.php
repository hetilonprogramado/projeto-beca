<?php

namespace App\Livewire\Turma;
use App\Models\Turmas;
use App\Models\Curso;
use Carbon\Carbon;

use Livewire\Component;

class Cadastrar extends Component
{
    public $cursos;

    public function mount()
    {
        $this->cursos = Curso::all(); // pega todos os cursos
    }

    public $empresa_id;
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
    ];

    public function salvar() {
        // --- Formatação dos campos ---
        $this->data_inicial = Carbon::parse($this->data_inicial)->format('Y-m-d');
        $this->data_final = $this->data_final ? Carbon::parse($this->data_final)->format('Y-m-d') : null;
        $this->data_encerrar_lancamento = $this->data_encerrar_lancamento ? Carbon::parse($this->data_encerrar_lancamento)->format('Y-m-d') : null;

       // $this->validate();
        
        Turmas::create([
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
            'user_deleted_id' => $this->user_deleted_id
        ]);
        // Limpa os campos do formulário
        $this->reset();
        session()->flash('message', 'Turma cadastrada com sucesso!');

    }

    public function render()
    {
        return view('livewire.turma.cadastrar');

        return view('livewire.turma.form');
    }
}
