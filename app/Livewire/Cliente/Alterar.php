<?php

namespace App\Livewire\Cliente;
use App\Models\Cliente;
use Carbon\Carbon;
use App\Models\Cidades;
use App\Models\Estados;
use Illuminate\Support\Facades\Http;
use Pest\ArchPresets\Custom;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Alterar extends Component
{
    public $cep;
    public $estado_id;
    public $cidade_id;
    public $estados = [];
    public $cidades = [];

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
    public $cliente_id;
    public $rsocial_nome;
    public $nfantasia_apelido;
    public $status_id;
    public $user_id;
    public $rua;
    public $numero;
    public $bairro;
    public $data_abert_nasc;
    public $tipo_pessoa;
    public $cnpj_cpf;
    public $ie_rg;
    public $email;
    public $sexo;
    public $user_deleted_id;
    public $registro_nascimento;
    public $nacionalidade;
    public $naturalidade;
    public $religiao;

    protected $rules = [
        'rsocial_nome' => 'required|min:3',
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
        'user_deleted_id' => 'nullable|exists:users,id',
        'registro_nascimento' => 'required',
        'nacionalidade' => 'required',
        'naturalidade' => 'required',
        'religiao' => 'required',
    ];

    public function mount($id)
    {
        $cliente = Cliente::findOrFail($id);

        $this->cliente_id = $cliente->id;
        $this->rsocial_nome = $cliente->rsocial_nome;
        $this->nfantasia_apelido = $cliente->nfantasia_apelido;
        $this->status_id = $cliente->status_id;
        $this->user_id = $cliente->user_id;
        $this->data_abert_nasc = $cliente->data_abert_nasc;
        $this->tipo_pessoa = $cliente->tipo_pessoa;
        $this->cnpj_cpf = $cliente->cnpj_cpf;
        $this->cep = $cliente->cep;
        $this->rua = $cliente->rua;
        $this->bairro = $cliente->bairro;
        $this->cidade_id = $cliente->cidade_id;
        $this->estado_id = $cliente->estado_id;
        $this->numero = $cliente->numero;
        $this->ie_rg = $cliente->ie_rg;
        $this->email = $cliente->email;
        $this->sexo = $cliente->sexo;
        $this->registro_nascimento = $cliente->registro_nascimento;
        $this->nacionalidade = $cliente->nacionalidade;
        $this->naturalidade = $cliente->naturalidade;
        $this->religiao = $cliente->religiao;

    }

    public function atualizar()
    {
        $this->validate();

        Cliente::where('id', $this->cliente_id)->update([
            'empresa_id' => 1,
            'rsocial_nome' => $this->rsocial_nome,
            'nfantasia_apelido' => $this->nfantasia_apelido,
            'status_id' => 1,
            'user_id' => 1,
            'rua' => $this->rua,
            'numero' => $this->numero,
            'cep' => $this->cep,
            'bairro' => $this->bairro,
            'estado_id' => $this->estado_id,
            'cidade_id' => $this->cidade_id,
            'data_abert_nasc' => Carbon::parse($this->data_abert_nasc),
            'tipo_pessoa' => $this->tipo_pessoa,
            'cnpj_cpf' => $this->cnpj_cpf,
            'ie_rg' => $this->ie_rg,
            'email' => $this->email,
            'sexo' => $this->sexo,
            'fornecedor' => $this->fornecedor,
            'user_deleted_id' => $this->user_deleted_id,
            'registro_nascimento' => $this->registro_nascimento,
            'nacionalidade' => $this->nacionalidade,
            'naturalidade' => $this->naturalidade,
            'religiao' => $this->religiao,
        ]);

        session()->flash('message', 'Cliente atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.cliente.alterar',[
            'estados' => $this->estados,
            'cidades' => $this->cidades,
        ]);
    }

    public function buscarCidades() {
        $this->cidades = Cidades::where('estado_id', $this->estado_id)->get();
    }
}
