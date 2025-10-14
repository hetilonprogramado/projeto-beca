<?php

namespace App\Livewire\Empresa;

use App\Models\Empresa;
use Livewire\Component;
use App\Models\Cidades;
use App\Models\Estados;
use App\Models\Statues;
use Illuminate\Support\Facades\Http;
use Pest\ArchPresets\Custom;
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

            if($cidades) {
                $this->cidade_id = $cidades->id;
                $this->estado_id = $cidades->estado_id;

                // garante que a lista de estados esteja carregada
                if (empty($this->estados)) {
                    $this->estados = Estados::all();
                }

                // atualiza lista de cidades para o estado
                $this->buscarCidades();
            }
        }
    }

    public $empresa_id;
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
    public $tipo_pessoa = 'Juridica';

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
        'tipo_pessoa' => 'required|in:Fisica,Juridica',
        'cep' => 'required|regex:/^\d{5}-\d{3}$/',
        'user_id' => 'required|exists:users,id',
        'cnpj' => 'required|regex:/^\d{2}\.\d{2}\.\d{3}\/\d{4}-\d{2}$/',
        'ie' => 'nullable|regex:/^\d{2}\.\d{3}\.\d{3}\.\d{3}$/',
    ];

    public function mount($id)
    {
        $empresa = Empresa::findOrFail($id);

        $this->empresa_id = $empresa->id;
        $this->rsocial = $empresa->rsocial;
        $this->nome_fantasia = $empresa->nome_fantasia;
        $this->status_id = $empresa->status_id;
        $this->user_id = $empresa->user_id;
        $this->cnpj = $empresa->cnpj;
        $this->ie = $empresa->ie;
        $this->cep = $empresa->cep;
        $this->rua = $empresa->rua;
        $this->numero = $empresa->numero;
        $this->bairro = $empresa->bairro;
        $this->estado_id = $empresa->estado_id;
        $this->cidade_id = $empresa->cidade_id;
        $this->modulo_id = $empresa->modulo_id;
        $this->email = $empresa->email;
        $this->telefone1 = $empresa->telefone1;
        $this->telefone2 = $empresa->telefone2;
        $this->site = $empresa->site;
        $this->data_lib = $empresa->data_lib;
        $this->tipo_pessoa = $empresa->tipo_pessoa;

        $this->estados = Estados::all();
        $this->cidades = Cidades::where('estado_id', $this->estado_id)->get();
        $this->statuses = Statues::all();

    }

    public function atualizar()
    {
        $this->validate();

        Empresa::where('id', $this->empresa_id)->update([
            'rsocial' => $this->rsocial,
            'nome_fantasia' => $this->nome_fantasia,
            'status_id' => $this->status_id,
            'user_id' => $this->user_id,
            'cnpj' => $this->cnpj,
            'ie' => $this->ie,
            'cep' => $this->cep,
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
        ]);

        session()->flash('message', 'Empresa atualizado com sucesso!');
    }

    public function cancelar()
    {
        $this->reset(); // limpa todos os campos
        session()->flash('message', 'Alterar cancelado!');
    }

    public function render()
    {
        return view('livewire.empresa.alterar', [
            'estados' => $this->estados,
            'cidades' => $this->cidades,
            'statuses' => $this->statuses,
        ]);
    }

    public function buscarCidades() {
        $this->cidades = Cidades::where('estado_id', $this->estado_id)->get();
    }
}
