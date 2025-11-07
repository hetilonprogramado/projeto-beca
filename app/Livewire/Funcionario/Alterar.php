<?php

namespace App\Livewire\Funcionario;

use App\Models\Cidades;
use App\Models\Estados;
use App\Models\Funcionario;
use App\Models\Statues;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class Alterar extends Component
{
    public $cep;
    public $estado_id;
    public $cidade_id;
    public $estados = [];
    public $cidades = [];
    public $statuses = [];

    public function mountCep()
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
            $cidades = Cidades::where('ibge_code', $data['ibge'])->first();

            $this->cidade_id = $cidades->id;
            $this->estado_id = $cidades->estado_id;
            $this->buscarCidades();
        }
    }

    public $empresa_id;
    public $nome;
    public $id;
    public $cpf;
    public $rg;
    public $sexo;
    public $status_id;
    public $user_system;
    public $user_deleted_id;
    public $user_id;
    public $senha_compra;
    public $rua;
    public $numero;
    public $bairro;
    public $data_admissao;
    public $data_demissao;
    public $telefone1;
    public $telefone2;
    public $salario;
    public $cargo;
    public $pis;
    public $ctps;
    public $data_nascimento;
    public $nome_mae;

    protected $rules = [
        'empresa_id' => 'required|exists:empresas,id',
        'nome' => 'required|string|max:255',
        'cpf' => 'required|string|max:14|unique:funcionarios,cpf,{id}',
        'rg' => 'nullable|string|max:20',
        'sexo' => 'nullable|in:M,F,O',
        'status_id' => 'required|integer',
        'rua' => 'nullable|string|max:255',
        'numero' => 'nullable|string|max:10',
        'bairro' => 'nullable|string|max:100',
        'data_admissao' => 'nullable|date',
        'data_demissao' => 'nullable|date|after_or_equal:data_admissao',
        'telefone1' => 'nullable|string|max:15',
        'telefone2' => 'nullable|string|max:15',
        'salario' => 'nullable|numeric|min:0',
        'cargo' => 'nullable|string|max:100',
        'pis' => 'nullable|string|max:20',
        'ctps' => 'nullable|string|max:20',
        'data_nascimento' => 'nullable|date',
        'nome_mae' => 'nullable|string|max:255',
    ];

    public function mount($id)
    {
        $funcionario = Funcionario::findOrFail($id);

        $this->id = $id;
        $this->getDados();
        $this->estados = Estados::all();
        $this->cidades = Cidades::where('estado_id', $funcionario->estado_id)->get();
        $this->statuses = Statues::all();
    }

    public function formatarValor($campo)
    {
        if (!property_exists($this, $campo)) {
            return;
        }

        $salario = trim($this->$campo ?? '');

        // Remove "R$", espaços e pontos de milhar
        $salario = str_replace(['R$', ' ', '.'], '', $salario);

        // Substitui vírgula por ponto para tratar como número
        $salario = str_replace(',', '.', $salario);

        // Se não for número, ignora
        if (!is_numeric($salario)) {
            $this->$campo = '0,00';
            return;
        }

        // Converte para float e formata no padrão brasileiro
        $valorFormatado = number_format((float) $salario, 2, ',', '.');

        // Atualiza o campo
        $this->$campo = $valorFormatado;
    }

    public function atualizar()
    {
        // --- Formatação dos campos ---
        $this->cep = preg_replace('/\D/', '', $this->cep);
        $this->cpf = preg_replace('/\D/', '', $this->cpf);
        $this->data_admissao = Carbon::parse($this->data_admissao)->format('Y-m-d');
        $this->data_demissao = Carbon::parse($this->data_demissao)->format('Y-m-d');
        $this->data_nascimento = Carbon::parse($this->data_nascimento)->format('Y-m-d');

        // Remove R$, pontos e troca vírgula por ponto
        $salario = str_replace(['R$', '.', ' '], '', $this->salario);
        $salario = str_replace(',', '.', $salario);

        $this->salario = number_format((float) $salario, 2, '.', '');

        try {
            $this->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Usuário: '.Auth::id().' Erro ao validar o Matricula: ' . $e->getMessage());
        }

        $funcionario = Funcionario::findOrFail($this->id);
        
        $funcionario-> name = $this->nome;
        $funcionario-> cpf = $this->cpf;
        $funcionario-> rg = $this->rg;
        $funcionario-> sexo = $this->sexo;
        $funcionario-> status_id = $this->status_id;
        $funcionario-> rua = $this->rua;
        $funcionario-> numero = $this->numero;
        $funcionario-> bairro = $this->bairro;
        $funcionario-> data_admissao = $this->data_admissao;
        $funcionario-> data_demissao = $this->data_demissao;
        $funcionario-> telefone1 = $this->telefone1;
        $funcionario-> telefone2 = $this->telefone2;
        $funcionario-> salario = $this->salario;
        $funcionario-> cargo = $this->cargo;
        $funcionario-> pis = $this->pis;
        $funcionario-> ctps = $this->ctps;
        $funcionario-> data_nascimento = $this->data_nascimento;
        $funcionario-> nome_mae = $this->nome_mae;
        $funcionario-> save();

        $this->getDados();

        session()->flash('message', 'Funcionario atualizado com sucesso!');
    }

    public function cancelar()
    {
        $this->reset(); // limpa todos os campos
        session()->flash('message', 'Alterar cancelado!');
    }

    public function render()
    {
        return view('livewire.funcionario.alterar', [
            'estados' => $this->estados,
            'cidades' => $this->cidades,
            'statuses' => $this->statuses,
        ]);
    }

    public function buscarCidades() {
        $this->cidades = Cidades::where('estado_id', $this->estado_id)->get();
    }

    public function getDados(){
        $funcionario = Funcionario::findOrFail($this->id);
        $this->id = $funcionario->id;
        $this->nome = $funcionario->nome;
        $this->cpf = $funcionario->cpf;
        $this->rg = $funcionario->rg;
        $this->sexo = $funcionario->sexo;
        $this->status_id = $funcionario->status_id;
        $this->rua = $funcionario->rua;
        $this->numero = $funcionario->numero;
        $this->bairro = $funcionario->bairro;
        $this->data_admissao = $funcionario->data_admissao;
        $this->data_demissao = $funcionario->data_demissao;
        $this->telefone1 = $funcionario->telefone1;
        $this->telefone2 = $funcionario->telefone2;
        $this->salario = number_format((float) $funcionario->salario, 2, ',', '.');
        $this->cargo = $funcionario->cargo;
        $this->pis = $funcionario->pis;
        $this->ctps = $funcionario->ctps;
        $this->data_nascimento = $funcionario->data_nascimento;
        $this->nome_mae = $funcionario->nome_mae;
    }
}
