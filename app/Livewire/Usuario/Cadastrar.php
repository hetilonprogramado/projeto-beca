<?php

namespace App\Livewire\Usuario;

use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Cidades;
use App\Models\Estados;
use App\Models\Statues;
use Illuminate\Support\Facades\Http;
use Pest\ArchPresets\Custom;
use Illuminate\Support\Facades\Auth;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class Cadastrar extends Component
{
    
    public $cep;
    public $estado_id;
    public $cidade_id;
    public $estados = [];
    public $cidades = [];
    public $statuses = [];

    public function mount()
    {
        $this->estados = Estados::all();
        $this->cidades = Cidades::where('estado_id', Auth()->user()->estado_id)->get();
        $this->estado_id = Auth()->user()->estado_id;
        $this->cidade_id = Auth()->user()->cidade_id;
        $this->statuses = Statues::all();
    }

    public function buscarCep()
    {
        $cep = preg_replace('/[^0-9]/', '', $this->cep);

        if (strlen($cep) !== 8) {
            return;
        }

        $response = Http::get("https://viacep.com.br/ws/{$cep}/json/");

        if ($response->ok() && !$response->json('erro')) {
            $data = $response->json();

            // Preenche os campos de endereço
            $this->rua = $data['logradouro'] ?? '';
            $this->bairro = $data['bairro'] ?? '';

            // Busca cidade pelo código IBGE
            $cidade = Cidades::where('ibge_code', $data['ibge'])->first();

            $this->cidade_id = $cidade->id;
            $this->estado_id = $cidade->estado_id;
            $this->buscarCidades();
        }
    }

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
    public $bairro;
    public $data_admissao;
    public $data_demissao;
    public $data_nascimento;
    public $telefone1;
    public $telefone2;
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
        'sexo' => 'required|in:Masculino,Feminino',
        'status_id' => 'required|exists:statuses,id',
        'user_system' => 'nullable|in:Sim,Nao',
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
        'telefone1' => 'nullable|string|max:15',
        'telefone2' => 'nullable|string|max:15',
        'salario' => 'nullable|numeric|min:0',
        'perc_compra' => 'nullable|numeric|min:0|max:100',
        'cargo' => 'nullable|string|max:100',
        'pis' => 'nullable|string|max:20',
        'ctps' => 'nullable|string|max:20',
        'token_app' => 'nullable|string|max:255',
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
        $this->cep = preg_replace('/\D/', '', $this->cep);
        $this->cpf = preg_replace('/\D/', '', $this->cpf);
        $this->rg = preg_replace('/\s+/', '', trim($this->rg));
        $this->data_nascimento = Carbon::parse($this->data_nascimento)->format('Y-m-d');
        $this->data_admissao = Carbon::parse($this->data_admissao)->format('Y-m-d');
        $this->data_demissao = $this->data_demissao ? Carbon::parse($this->data_demissao)->format('Y-m-d') : null;

       // $this->validate();
        
        User::create([
            'empresa_id' =>Auth()->user()->empresa_id ?? 1,
            'status_id' => $this->status_id,
            'grupo_usuario_id' => 1,
            'user_id' => Auth()->user()->id,
            'user_deleted_id' => $this->user_deleted_id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'codigo_acesso' => $this->codigo_acesso,
            'cpf' => $this->cpf,
            'rg' => $this->rg,
            'sexo' => $this->sexo,
            'user_system' => $this->user_system,
            'rua' => $this->rua,
            'numero' => $this->numero,
            'cep' => $this->cep,
            'bairro' => $this->bairro,
            'cidade_id' => $this->cidade_id,
            'estado_id' => $this->estado_id,
            'data_admissao' => $this->data_admissao,
            'data_demissao' => $this->data_demissao,
            'data_nascimento' => $this->data_nascimento,
            'telefone1' => $this->telefone1,
            'telefone2' => $this->telefone2,
            'salario' => $this->salario,
            'perc_compra' => $this->perc_compra,
            'cargo' => $this->cargo,
            'pis' => $this->pis,
            'ctps' => $this->ctps
        ]);
        // Limpa os campos do formulário
        $this->reset();
        session()->flash('message', 'Usuario cadastrado com sucesso!');

    }

    public function render()
    {
        return view('livewire.usuario.cadastrar', [
            'estados' => $this->estados,
            'cidades' => $this->cidades,
        ]);
    }

    public function buscarCidades() {
        $this->cidades = Cidades::where('estado_id', $this->estado_id)->get();
    }
}
