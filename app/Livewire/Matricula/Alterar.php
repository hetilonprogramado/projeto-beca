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
use Illuminate\Support\Facades\Log;

class Alterar extends Component
{
    public $empresa_id;
    public $id;
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
        'status_id' => 'required|exists:statuses,id',
        'cliente_id' => 'required|integer',
        'curso_id' => 'required|integer',
        'turma_id' => 'required|integer',
        'sala_id' => 'required|integer',
        'valor' => 'nullable|numeric',
        'desconto' => 'nullable|numeric',
        'data_cad' => 'required|date',
        'ordem' => 'required|integer',
        'obs_carteira' => 'nullable|string',
        'aluno_curso' => 'nullable|string|max:255',
        'instituicao_anterior' => 'nullable|string|max:255',
        'user_deleted_id' => 'nullable|integer',
        'sinc' => 'nullable|boolean',
        'empresa_id' => 'required|integer',
        'user_id' => 'required|integer',
    ];

    public function mount($id)
    {
        $this->id = $id;
        $this->getDados();
        $this->clientes = Cliente::all();
        $this->cursos = Curso::all();
        $this->turmas = Turmas::all();
        $this->salas = Salas::all();
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

    public function atualizar()
    {
        // Formata valor e desconto para float
        $valor = str_replace(['R$', '.', ' '], '', $this->valor);
        $valor = str_replace(',', '.', $valor);

        $this->valor = number_format((float) $valor, 2, '.', '');

        $desconto = str_replace(['R$', '.', ' '], '', $this->desconto);
        $desconto = str_replace(',', '.', $desconto);
        $this->desconto = number_format((float) $desconto, 2, '.', '');

        try {
            $this->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Usuário: '.Auth::id().' Erro ao validar o Matricula: ' . $e->getMessage());
        }

        $matricula = Matriculas::findOrFail($this->id);

        $matricula->status_id = $this->status_id;
        $matricula->cliente_id = $this->cliente_id;
        $matricula->curso_id = $this->curso_id;
        $matricula->turma_id = $this->turma_id;
        $matricula->sala_id = $this->sala_id;
        $matricula->valor = $valor;
        $matricula->desconto = $desconto;
        $matricula->data_cad = $this->data_cad;
        $matricula->ordem = $this->ordem;
        $matricula->obs_carteira = $this->obs_carteira;
        $matricula->aluno_curso = $this->aluno_curso;
        $matricula->instituicao_anterior = $this->instituicao_anterior;
        $matricula->empresa_id = $this->empresa_id;
        $matricula->user_id = $this->user_id;
        $matricula->user_deleted_id = $this->user_deleted_id;
        $matricula->sinc = $this->sinc;
        $matricula->save();

        $this->getDados();

        session()->flash('message', 'Matrícula atualizada com sucesso!');
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

    public function getDados(){
        $matricula = Matriculas::findOrFail($this->id);
        $this->id = $matricula->id;
        $this->status_id = $matricula->status_id;
        $this->cliente_id = $matricula->cliente_id;
        $this->curso_id = $matricula->curso_id;
        $this->turma_id = $matricula->turma_id;
        $this->sala_id = $matricula->sala_id;
        $this->valor = number_format($matricula->valor, 2, ',', '.');
        $this->desconto = number_format($matricula->desconto, 2, ',', '.');
        $this->data_cad = $matricula->data_cad;
        $this->ordem = $matricula->ordem;
        $this->obs_carteira = $matricula->obs_carteira;
        $this->aluno_curso = $matricula->aluno_curso;
        $this->instituicao_anterior = $matricula->instituicao_anterior;
        $this->empresa_id = $matricula->empresa_id;
        $this->user_id = $matricula->user_id;
    }
}
