<?php

namespace App\Livewire\Turma;
use App\Models\Turmas;
use App\Models\Curso;
use App\Models\Salas;
use App\Models\Statues;
use Carbon\Carbon;

use Livewire\Component;

class Cadastrar extends Component
{
    public $cursos = [];
    public $salas = [];
    public $statuses = [];

    public function mount()
    {
        $this->cursos = Curso::all(); // pega todos os cursos
        $this->salas = Salas::all();
        $this->statuses = Statues::all();
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

    public function formatarValor($campo)
    {
        if (!property_exists($this, $campo)) {
            return;
        }

        $valor = trim($this->$campo ?? '');

        // Remove R$ e espaços
        $valor = str_replace(['R$', ' '], '', $valor);

        // Se o campo estiver vazio
        if ($valor === '' || $valor === null) {
            $this->$campo = '0,00';
            return;
        }

        // Substitui ponto por nada e vírgula por ponto apenas para checar se é número
        $numeroVerificado = str_replace(['.', ','], ['', '.'], $valor);

        // Se não for número, apenas retorna sem mudar
        if (!is_numeric($numeroVerificado)) {
            return;
        }

        // Verifica se já tem vírgula (decimal)
        if (!str_contains($valor, ',')) {
            // Se não tem vírgula, adiciona ,00
            $valor .= ',00';
        }

        // Remove zeros à esquerda desnecessários
        $valor = ltrim($valor, '0');
        if ($valor === '' || $valor[0] === ',') {
            $valor = '0' . $valor;
        }

        // Atualiza o campo
        $this->$campo = $valor;
    }

    public function salvar() {
        // --- Formatação dos campos ---
        $this->data_inicial = Carbon::parse($this->data_inicial)->format('Y-m-d');
        $this->data_final = $this->data_final ? Carbon::parse($this->data_final)->format('Y-m-d') : null;
        $this->data_encerrar_lancamento = $this->data_encerrar_lancamento ? Carbon::parse($this->data_encerrar_lancamento)->format('Y-m-d') : null;

       // $this->validate();

       $valor = $this->valor;

       // Remove R$, pontos e troca vírgula por ponto
       $valor = str_replace(['R$', '.', ' '], '', $valor);
       $valor = str_replace(',', '.', $valor);
        
        Turmas::create([
            'empresa_id' => 1,
            'nome' => $this->nome,
            'curso_id' => 1,
            'sala_id' => 1,
            'valor' => $valor,
            'data_inicial' => $this->data_inicial,
            'data_final' => $this->data_final,
            'status_id' => $this->status_id,
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
