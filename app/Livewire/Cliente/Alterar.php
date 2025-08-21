<?php

namespace App\Livewire\Cliente;
use App\Models\Cliente;

use Livewire\Component;

class Alterar extends Component
{
    public $empresa_id;
    public $cliente_id;
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
        'rsocial_nome' => 'required|min:3',
        'cnpj_cpf' => 'required|string|max:14',
        'telefone' => 'nullable|string|max:15',
        'telefone_fixo' => 'nullable|string|max:15',
        'cep' => 'nullable|string|max:9',
        'rua' => 'nullable|string|max:255',
        'bairro' => 'nullable|string|max:255',
        'cidade_id' => 'nullable|string|max:255',
        'estado_id' => 'nullable|string|max:2',
    ];

    public function mount($id)
    {
        $cliente = Cliente::findOrFail($id);

        $this->cliente_id = $cliente->id;
        $this->rsocial_nome = $cliente->rsocial_nome;
        $this->cnpj_cpf = $cliente->cnpj_cpf;
        $this->cep = $cliente->cep;
        $this->rua = $cliente->rua;
        $this->bairro = $cliente->bairro;
        $this->cidade_id = $cliente->cidade_id;
        $this->estado_id = $cliente->estado_id;
    }

    public function atualizar()
    {
        $this->validate();

        Cliente::where('id', $this->clienteId)->update([
            'rsocial_nome' => $this->rsocial_nome,
            'cnpj_cpf' => $this->cnpj_cpf,
            'telefone' => $this->telefone,
            'telefone_fixo' => $this->telefone_fixo,
            'cep' => $this->cep,
            'rua' => $this->rua,
            'bairro' => $this->bairro,
            'cidade_id' => $this->cidade_id,
            'estado_id' => $this->estado_id
        ]);

        session()->flash('message', 'Cliente atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.cliente.alterar');
    }
}
