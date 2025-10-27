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
        'rsocial' => 'required|string|max:255',
        'nome_fantasia' => 'required|string|max:255',
        'status_id' => 'required|exists:statuses,id',
        'cnpj' => 'nullable|digits_between:11,14',
        'ie' => 'nullable|string|max:20',
        'rua' => 'required|string|max:255',
        'numero' => 'required|string|max:10',
        'bairro' => 'required|string|max:100',
        'estado_id' => 'required|exists:estados,id',
        'cidade_id' => 'required|exists:cidades,id',    
        'email' => 'nullable|email|max:255',
        'telefone1' => 'nullable|string|max:20',
        'telefone2' => 'nullable|string|max:20',
        'site' => 'nullable|url|max:255',
        'data_lib' => 'nullable|date',
        'cep' => 'nullable|digits:8',
        'modulo_id' => 'nullable|exists:modulos,id',
        'tipo_pessoa' => 'required|in:Juridica,Fisica',
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
        $this->cnpj = preg_replace('/\D/', '', $this->cnpj);

        $this->validate();

        $empresa = Empresa::find($this->empresa_id);
        
        $empresa-> rsocial = $this->rsocial;
        $empresa-> nome_fantasia = $this->nome_fantasia;
        $empresa-> status_id = $this->status_id;
        $empresa-> cnpj = $this->cnpj;
        $empresa-> ie = $this->ie;
        $empresa-> cep = $this->cep;
        $empresa-> rua = $this->rua;
        $empresa-> numero = $this->numero;
        $empresa-> bairro = $this->bairro;
        $empresa-> estado_id = $this->estado_id;
        $empresa-> cidade_id = $this->cidade_id;
        $empresa-> modulo_id = $this->modulo_id;
        $empresa-> email = $this->email;
        $empresa-> telefone1 = $this->telefone1;
        $empresa-> telefone2 = $this->telefone2;
        $empresa-> site = $this->site;
        $empresa-> data_lib = $this->data_lib;
        $empresa-> tipo_pessoa = $this->tipo_pessoa;
        $empresa-> save();

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
