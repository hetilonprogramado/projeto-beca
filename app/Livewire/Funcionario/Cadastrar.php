<?php

namespace App\Livewire\Funcionario;

use App\Models\Cidades;
use App\Models\Estados;
use App\Models\Funcionario;
use App\Models\Statues;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

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
            $cidades = Cidades::where('ibge_code', $data['ibge'])->first();

            $this->cidade_id = $cidades->id;
            $this->estado_id = $cidades->estado_id;
            $this->buscarCidades();
        }
    }

    public $empresa_id;
    public $nome;
    public $cpf;
    public $rg;
    public $sexo;
    public $status_id = 1;
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

    protected function validarDados(): array{
        $rules = [
            'empresa_id' => 'required|exists:empresas,id',
            'nome' => 'required|min:4',
            'cpf' => 'nullable|digits_between:11,14',
            'rg' => 'nullable|min:3',
            'sexo' => 'required|in:Masculino,Feminino',
            'status_id' => 'required|exists:statuses,id',
            'user_system' => 'required|exists:users,id',
            'user_deleted_id' => 'nullable|exists:users,id',
            'user_id' => 'required|exists:users,id',
            'senha_compra' => 'nullable|min:4',
            'rua' => 'required|min:3',
            'numero' => 'required|numeric',
            'cep' => 'nullable|digits:8',
            'bairro' => 'nullable|min:3',
            'cidade_id' => 'required|exists:cidades,id',
            'estado_id' => 'required|exists:estados,id',
            'data_admissao' => 'nullable|date',
            'data_demissao' => 'nullable|date',
            'telefone1' => 'nullable|min:9',
            'telefone2' => 'nullable|min:9',
            'salario' => 'nullable|numeric',
            'cargo' => 'nullable|min:3',
            'pis' => 'nullable|min:11',
            'ctps' => 'nullable|min:3',
            'data_nascimento' => 'nullable|date',
            'nome_mae' => 'nullable|min:4',
        ];

        return $this->validate($rules);
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

    public function salvar() {
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

       // $this->validate();
        
        Funcionario::create([
            'empresa_id' =>Auth()->user()->empresa_id ?? 1,
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'rg' => $this->rg,
            'sexo' => $this->sexo,
            'status_id' => $this->status_id,
            'user_system' => $this->user_system,
            'user_deleted_id' => $this->user_deleted_id,
            'user_id' => Auth()->user()->id,
            'senha_compra' => $this->senha_compra,
            'rua' => $this->rua,
            'numero' => $this->numero,
            'cep' => $this->cep,
            'bairro' => $this->bairro,
            'cidade_id' => $this->cidade_id,
            'estado_id' => $this->estado_id,
            'data_admissao' => $this->data_admissao,
            'data_demissao' => $this->data_demissao,
            'telefone1' => $this->telefone1,
            'telefone2' => $this->telefone2,
            'salario' => $this->salario,
            'cargo' => $this->cargo,
            'pis' => $this->pis,
            'ctps' => $this->ctps,
            'data_nascimento' => $this->data_nascimento,
            'nome_mae' => $this->nome_mae
        ]);
        // Limpa os campos do formulário
        $this->reset();
        session()->flash('message', 'Funcionario cadastrado com sucesso!');

    }

    public function render()
    {
        return view('livewire.funcionario.cadastrar');
    }

    public function buscarCidades() {
        $this->cidades = Cidades::where('estado_id', $this->estado_id)->get();
    }
}
