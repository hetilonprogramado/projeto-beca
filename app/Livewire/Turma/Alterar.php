<?php

namespace App\Livewire\Turma;
use App\Models\Turmas;
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
    ];

    public function mount($id)
    {
        $turma = Turmas::findOrFail($id);

        $this->turma_id = $turma->id;
        $this->nome = $turma->rsocial_nome;
        $this->valor = $turma->cnpj_cpf;
        $this->data_inicial = $turma->cep;
        $this->data_final = $turma->rua;
        $this->carga_hr = $turma->bairro;
    }

    public function atualizar()
    {
        $this->validate();

        Turmas::where('id', $this->turmaId)->update([
            'nome' => $this->nome,
            'valor' => $this->valor,
            'data_inicial' => $this->data_inicial,
            'data_final' => $this->data_final,
            'carga_hr' => $this->carga_hr,
        ]);

        session()->flash('message', 'Turms atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.turma.alterar');
    }
}
