<?php

namespace App\Livewire\Matricula;
use App\Models\Matriculas;
use App\Models\Curso;
use App\Models\Cliente;
use App\Models\Salas;
use App\Models\Statues;
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
    public $statuses = [];

    public function mount()
    {
        $this->cursos = Curso::all(); 
        $this->salas = Salas::all();
        $this->turmas = Turmas::all();
        $this->clientes = Cliente::all();
        $this->statuses = Statues::all();
    }

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

       $valor = $this->valor;
       $desconto = $this->desconto;

       // Remove R$, pontos e troca vírgula por ponto
       $valor = str_replace(['R$', '.', ' '], '', $valor);
       $valor = str_replace(',', '.', $valor);

       $desconto = str_replace(['R$', '.', ' '], '', $desconto);
       $desconto = str_replace(',', '.', $desconto);
        
        Matriculas::create([
            'empresa_id' => 1,
            'status_id' => $this->status_id,
            'cliente_id' => $this->cliente_id,
            'curso_id' => $this->curso_id,
            'turma_id' => $this->turma_id,
            'sala_id' => $this->sala_id,
            'valor' => $valor,
            'desconto' => $desconto,
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
