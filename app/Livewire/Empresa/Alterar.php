<?php

namespace App\Livewire\Empresa;

use App\Models\Empresa;
use Livewire\Component;

class Alterar extends Component
{
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

    }

    public function atualizar()
    {
        $this->validate();

        Empresa::where('id', $this->empresaId)->update([
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

        session()->flash('message', 'Empresa atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.empresa.alterar');
    }
}
