<?php

namespace App\Livewire\Clientes;

use Livewire\Component;

class Cliente extends Component
{
    public $nome;
    public $endereco;
    public $data_nasc;
    public $cpf_cnpj;
    public $email;
    public $telefone;
    public $status;
    public $foto;

    protected function validarDados(): array{
        $rules = [
            'nome' => 'required|min:4',
            'endereco' => 'nullable|min:3',
            'data_nasc' => 'nullable|date',
            'cpf_cnpj' => 'nullable|digits_between:11,14',
            'email' => 'nullable|email',
            'telefone' => 'nullable|min:9',
            'status' => 'nullable',
        ];

        return $this->validate($rules);
    }

    public function salvar() {
        // --- Formatação dos campos ---
        $this->cpf = preg_replace('/\D/', '', $this->cpf);

       // $this->validate();
        
        $aluno = Cliente::create([
            'nome' => $this->nome,
            'endereco' => $this->endereco,
            'status' => $this->status,
            'data_nasc' => Carbon::parse($this->data_nasc)->format('Y-m-d'),
            'cpf' => $this->cpf,
            'email' => $this->email,
            'telefone' => $this->telefone,
        ]);
        // Limpa os campos do formulário
        $this->reset([
            'nome',
            'apelido',
            'rua',
            'numero',
            'cep',
            'bairro',
            'estado_id',
            'cidade_id',
            'data_nasc',
            'cpf',
            'rg',
            'email',
            'sexo',
            'registro_nascimento',
            'nacionalidade',
            'naturalidade',
            'religiao',
            'celular',
            'status_id',
        ]);
        session()->flash('message', 'Cliente cadastrado com sucesso!');

    }


    public function render()
    {
        return view('livewire.clientes.cliente');
    }
}
