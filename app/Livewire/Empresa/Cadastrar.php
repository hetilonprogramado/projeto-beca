<?php

namespace App\Livewire\Empresa;

use App\Models\Empresa;
use Carbon\Carbon;
use Livewire\Component;

class Cadastrar extends Component
{
    public $rsocial;
    public $nome_fantasia;
    public $status_id;
    public $user_id;
    public $cnpj;
    public $ie;
    public $rua;
    public $numero;
    public $bairro;
    public $estado_id;
    public $cidade_id;
    public $modulo_id;
    public $email;
    public $telefone1;
    public $telefone2;
    public $site;
    public $data_lib;
    public $tipo_pessoa;
    public $cep;

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
            'estado_id' => 17,
            'cidade_id' => 21,
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

    public function render()
    {
        return view('livewire.empresa.cadastrar');
    }
}
