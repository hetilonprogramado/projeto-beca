<?php

namespace App\Livewire\Turma;

use App\Models\Turmas;
use App\Models\Curso;
use App\Models\Salas;
use App\Models\Statues;
use App\Models\TurmaDisciplina;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

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
    public $exibir_data_final = false;
    public $tipo_conta_id;
    public $data_encerrar_lancamento;
    public $user_deleted_id;

    public $cursos = [];
    public $salas = [];
    public $statuses = [];
    public $turma;

    public $professores = [];

    protected $rules = [
        'nome' => 'required|string|max:255',
        'curso_id' => 'required|integer|exists:cursos,id',
        'sala_id' => 'required|integer|exists:salas,id',
        'valor' => 'required|numeric|min:0',
        'data_inicial' => 'required|date',
        'data_final' => 'nullable|date|after_or_equal:data_inicial',
        'carga_hr' => 'required|integer|min:1',
        'data_encerrar_lancamento' => 'nullable|date',
        'user_deleted_id' => 'nullable|integer',
        'empresa_id' => 'nullable|integer',
        'user_id' => 'nullable|integer',
        'tipo_conta_id' => 'nullable|integer',
        'turma_id' => 'nullable|integer',
        'exibir_data_final' => 'nullable|boolean',
    ];

    public function deletar($id){
        $professor = TurmaDisciplina::find($id);

        if ($professor) {
            $professor->delete();
            session()->flash('message', 'Professor deletado com sucesso!');
        } else {
            session()->flash('message', 'Professor não encontrado!');
        }
    }

    public function formatarValor($campo)
    {
        if (!property_exists($this, $campo)) {
            return;
        }

        $valor = trim($this->$campo ?? '');

        // Remove "R$", espaços e pontos de milhar
        $valor = str_replace(['R$', ' ', '.'], '', $valor);

        // Substitui vírgula por ponto para tratar como número
        $valor = str_replace(',', '.', $valor);

        // Se não for número, ignora
        if (!is_numeric($valor)) {
            $this->$campo = '0,00';
            return;
        }

        // Converte para float e formata no padrão brasileiro
        $valorFormatado = number_format((float) $valor, 2, ',', '.');

        // Atualiza o campo
        $this->$campo = $valorFormatado;
    }

    public function mount($id)
    {
        $turma = Turmas::findOrFail($id);

        $this->turma_id = $turma->id;
        $this->nome = $turma->nome;
        $this->curso_id = $turma->curso_id;
        $this->sala_id = $turma->sala_id;
        $this->valor = number_format($turma->valor, 2, ',', '.');
        $this->data_inicial = $turma->data_inicial;
        $this->data_final = $turma->data_final;
        $this->status_id = $turma->status_id;
        $this->carga_hr = $turma->carga_hr;
        $this->user_deleted_id = $turma->user_deleted_id;
        $this->empresa_id = $turma->empresa_id;
        $this->user_id = $turma->user_id;
        $this->tipo_conta_id = $turma->tipo_conta_id;
        $this->data_encerrar_lancamento = $turma->data_encerrar_lancamento;
        $this->exibir_data_final = $turma->data_final ? true : false;

        $this->statuses = Statues::all();
        $this->cursos = Curso::all();
        $this->salas = Salas::all();
        $this->turma = Turmas::findOrFail($id);

        $this->professores = TurmaDisciplina::where('turma_id', $turma->id)
            ->with(['funcionario']) // se quiser já carregar os relacionamentos
            ->get();

    }

    public function atualizar()
    {
       // Remove R$, pontos e troca vírgula por ponto
        $valor = str_replace(['R$', '.', ' '], '', $this->valor);
        $valor = str_replace(',', '.', $valor);

        $this->valor = number_format((float) $valor, 2, '.', '');

        $this->validate();

        $turma = Turmas::find($this->turma_id);
        
        $turma->nome = $this->nome;
        $turma->curso_id = $this->curso_id;
        $turma->sala_id = $this->sala_id;
        $turma->valor = $valor;
        $turma->data_inicial = $this->data_inicial;
        $turma->data_final = $this->exibir_data_final ? $this->data_final : null;
        $turma->status_id = $this->status_id;
        $turma->carga_hr = $this->carga_hr;
        $turma->user_deleted_id = $this->user_deleted_id;
        $turma->empresa_id = Auth()->user()->empresa_id ?? 1;
        $turma->user_id = Auth()->user()->id;
        $turma->tipo_conta_id = $this->tipo_conta_id;
        $turma->data_encerrar_lancamento = $this->data_encerrar_lancamento;
        $turma->save();

        session()->flash('message', 'Turma atualizado com sucesso!');
    }

    public function cancelar()
    {
        $this->reset(); // limpa todos os campos
        session()->flash('message', 'Alterar cancelado!');
    }

    public function render()
    {
        return view('livewire.turma.alterar', [
            'cursos' => $this->cursos,
            'salas' => $this->salas,
            'statuses' => $this->statuses,
            'professores' => $this->professores ?? [],
        ]);
    }
}
