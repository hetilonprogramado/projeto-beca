<?php

namespace App\Livewire\Empresa;

use App\Models\Empresa;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Cidades;
use App\Models\Estados;
use Illuminate\Support\Facades\Http;
use Pest\ArchPresets\Custom;
use Illuminate\Support\Facades\Auth;

class Cadastrar extends Component
{
    public $cep;
    public $estado_id;
    public $cidade_id;
    public $estados = [];
    public $cidades = [];

    public function mount()
    {
        $this->estados = Estados::all();
        $this->cidades = Cidades::where('estado_id', Auth()->user()->estado_id)->get();
        $this->estado_id = Auth()->user()->estado_id;
        $this->cidade_id = Auth()->user()->cidade_id;
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

    public $rsocial;
    public $nome_fantasia;
    public $status_id;
    public $user_id;
    public $cnpj;
    public $ie;
    public $rua;
    public $numero;
    public $bairro;
    public $modulo_id;
    public $email;
    public $telefone1;
    public $telefone2;
    public $site;
    public $data_lib;
    public $tipo_pessoa;

    protected $rules = [
        'rsocial' => 'required|min:4',
        'nome_fantasia' => 'required|min:4',
        'status_id' => 'required|exists:statuses,id',
        'rua' => 'required|min:3',
        'numero' => 'required|numeric',
        'cep' => 'required|regex:/^\d{8}$/',
        'bairro' => 'required|min:3',
        'estado_id' => 'required|exists:estados,id',
        'cidade_id' => 'required|exists:cidades,id',
        'email' => 'nullable|email',
        'telefone1' => 'nullable|regex:/^\(\d{2}\) \d{4,5}-\d{4}$/',
        'telefone2' => 'nullable|regex:/^\(\d{2}\) \d{4,5}-\d{4}$/',
        'site' => 'nullable|url',
        'data_lib' => 'nullable|date',
        'tipo_pessoa' => 'required|in:1,2',
        'cep' => 'required|regex:/^\d{5}-\d{3}$/',
        'user_id' => 'required|exists:users,id',
        'cnpj' => 'required|regex:/^\d{2}\.\d{2}\.\d{3}\/\d{4}-\d{2}$/',
        'ie' => 'nullable|regex:/^\d{2}\.\d{3}\.\d{3}\.\d{3}$/',
    ];

    public function salvar() {
        // --- Formatação dos campos ---
        $this->cep = preg_replace('/\D/', '', $this->cep);
        $this->cnpj = preg_replace('/\D/', '', $this->cnpj);
        $this->ie = preg_replace('/\s+/', '', trim($this->ie));
        $this->data_lib = Carbon::parse($this->data_lib)->format('Y-m-d');

       // $this->validate();
        
        Empresa::create([
            'rsocial' => $this->rsocial,
            'nome_fantasia' => $this->nome_fantasia,
            'status_id' => 1,
            'user_id' => 1,
            'cnpj' => $this->cnpj,
            'ie' => $this->ie,
            'rua' => $this->rua,
            'numero' => $this->numero,
            'bairro' => $this->bairro,
            'estado_id' => $this->estado_id,
            'cidade_id' => $this->cidade_id,
            'email' => $this->email,
            'telefone1' => $this->telefone1,
            'telefone2' => $this->telefone2,
            'site' => $this->site,
            'data_lib' => $this->data_lib,
            'tipo_pessoa' => $this->tipo_pessoa,
            'cep' => $this->cep,
        ]);
        // Limpa os campos do formulário
        $this->reset();
        session()->flash('message', 'Empresa cadastrado com sucesso!');

    }

    public function cancelar()
    {
        $this->reset(); // limpa todos os campos
        session()->flash('message', 'Cadastro cancelado!');
    }

    public function render()
    {
        return view('livewire.empresa.cadastrar', [
            'estados' => $this->estados,
            'cidades' => $this->cidades,
        ]);
    }

    public function buscarCidades() {
        $this->cidades = Cidades::where('estado_id', $this->estado_id)->get();
    }
}
