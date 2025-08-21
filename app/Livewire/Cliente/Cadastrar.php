<?php

namespace App\Livewire\Cliente;

use Livewire\Component;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Pest\ArchPresets\Custom;

class Cadastrar extends Component
{
    public $empresa_id;
    public $rsocial_nome;
    public $nfantasia_apelido;
    public $status_id;
    public $user_id;
    public $rua;
    public $numero;
    public $cep;
    public $bairro;
    public $estado_id;
    public $cidade_id;
    public $data_abert_nasc;
    public $tipo_pessoa;
    public $cnpj_cpf;
    public $ie_rg;
    public $email;
    public $sexo;
    public $fornecedor;
    public $user_deleted_id;

    protected $rules = [
        'empresa_id' => 'required|exists:empresas,id',
        'rsocial_nome' => 'required|min:4',
        'nfantasia_apelido' => 'required|min:4',
        'status_id' => 'required|exists:statuses,id',
        'rua' => 'required|min:3',
        'numero' => 'required|numeric',
        'cep' => 'required|regex:/^\d{8}$/',
        'bairro' => 'required|min:3',
        'estado_id' => 'required|exists:estados,id',
        'cidade_id' => 'required|exists:cidades,id',
        'data_abert_nasc' => 'required|date',
        'tipo_pessoa' => 'required|in:Fisica,Juridica', //Pessoa Física, Pessoa Jurídica
        'cnpj_cpf' => 'required|regex:/^(\d{11}|\d{14})$/',// 11 digits for CPF, 14 for CNPJ
        'ie_rg' => 'required|min:3',
        'email' => 'required|email',
        'sexo' => 'required|in:Masculino,Feminino', // M for Masculino, F
        'fornecedor' => 'required|in:Sim,Nao',
        'user_deleted_id' => 'nullable|exists:users,id',
    ];

    public function salvar() {
        // --- Formatação dos campos ---
        $this->cep = preg_replace('/\D/', '', $this->cep);
        $this->cnpj_cpf = preg_replace('/\D/', '', $this->cnpj_cpf);
        $this->ie_rg = preg_replace('/\s+/', '', trim($this->ie_rg));
        $this->data_abert_nasc = Carbon::parse($this->data_abert_nasc)->format('Y-m-d');

       // $this->validate();
        
        Cliente::create([
            'empresa_id' => 1,
            'rsocial_nome' => $this->rsocial_nome,
            'nfantasia_apelido' => $this->nfantasia_apelido,
            'status_id' => 1,
            'user_id' => 1,
            'rua' => $this->rua,
            'numero' => $this->numero,
            'cep' => $this->cep,
            'bairro' => $this->bairro,
            'estado_id' => 17,
            'cidade_id' => 13,
            'data_abert_nasc' => Carbon::parse($this->data_abert_nasc),
            'tipo_pessoa' => $this->tipo_pessoa,
            'cnpj_cpf' => $this->cnpj_cpf,
            'ie_rg' => $this->ie_rg,
            'email' => $this->email,
            'sexo' => $this->sexo,
            'fornecedor' => $this->fornecedor,
            'user_deleted_id' => $this->user_deleted_id
        ]);
        // Limpa os campos do formulário
        $this->reset();
        session()->flash('message', 'Cliente cadastrado com sucesso!');

    }

    public function render()
    {
        return view('livewire.cliente.cadastrar');
    }
}
