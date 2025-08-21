<?php

namespace App\Livewire\Usuario;

use App\Models\User;
use Carbon\Carbon;

use Livewire\Component;

class Cadastrar extends Component
{
    public $name;
    public $email;
    public $password;
    public $empresa_id;
    public $grupo_usuario_id;
    public $codigo_acesso;
    public $cpf;
    public $rg;
    public $sexo;
    public $status_id;
    public $user_system;
    public $user_deleted_id;
    public $user_id;
    public $rua;
    public $numero;
    public $cep;
    public $bairro;
    public $cidade_id;
    public $estado_id;
    public $data_admissao;
    public $data_demissao;
    public $data_nascimento;
    public $telefone01;
    public $telefone02;
    public $salario;
    public $perc_compra;
    public $cargo;
    public $pis;
    public $ctps;
    public $token_app;
    public $foto;
    public $deleted_at;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'empresa_id' => 'required|exists:empresas,id',
        'grupo_usuario_id' => 'required|exists:grupo_usuarios,id',
        'codigo_acesso' => 'nullable|string|max:50',
        'cpf' => 'nullable|string|max:14',
        'rg' => 'nullable|string|max:20',
        'sexo' => 'nullable|string|max:1',
        'status_id' => 'required|exists:statuses,id',
        'user_system' => 'boolean',
        'user_deleted_id' => 'nullable|exists:users,id',
        'user_id' => 'required|exists:users,id',
        'rua' => 'nullable|string|max:255',
        'numero' => 'nullable|string|max:10',
        'cep' => 'nullable|string|max:10',
        'bairro' => 'nullable|string|max:100',
        'cidade_id' => 'required|exists:cidades,id',
        'estado_id' => 'required|exists:estados,id',
        'data_admissao' => 'nullable|date',
        'data_demissao' => 'nullable|date',
        'data_nascimento' => 'nullable|date',
        'telefone01' => 'nullable|string|max:15',
        'telefone02' => 'nullable|string|max:15',
        'salario' => 'nullable|numeric|min:0',
        'perc_compra' => 'nullable|numeric|min:0|max:100',
        'cargo' => 'nullable|string|max:100',
        'pis' => 'nullable|string|max:20',
        'ctps' => 'nullable|string|max:20',
        'token_app' => 'nullable|string|max:255',
    ];

    public function salvar() {
        // --- Formatação dos campos ---
        $this->cep = preg_replace('/\D/', '', $this->cep);
        $this->cpf = preg_replace('/\D/', '', $this->cpf);
        $this->rg = preg_replace('/\s+/', '', trim($this->rg));
        $this->data_nascimento = Carbon::parse($this->data_nascimento)->format('Y-m-d');
        $this->data_admissao = Carbon::parse($this->data_admissao)->format('Y-m-d');
        $this->data_demissao = $this->data_demissao ? Carbon::parse($this->data_demissao)->format('Y-m-d') : null;

       // $this->validate();
        
        User::create([
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
        session()->flash('message', 'Usuario cadastrado com sucesso!');

    }

    public function render()
    {
        return view('livewire.usuario.cadastrar');
    }
}
