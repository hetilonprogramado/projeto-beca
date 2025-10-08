<?php

namespace App\Livewire\Usuario;

use App\Models\Cidades;
use App\Models\Estados;
use App\Models\Statues;
use App\Models\User;
use Livewire\Component;

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
            $cidade = Cidades::where('ibge_code', $data['ibge'])->first();

            $this->cidade_id = $cidade->id;
            $this->estado_id = $cidade->estado_id;
            $this->buscarCidades();
        }
    }

    public $name;
    public $usuario_id;
    public $email;
    public $password;
    public $empresa_id;
    public $grupo_usuario_id;
    public $codigo_acesso;
    public $cpf;
    public $rg;
    public $sexo;
    public $status_id;
    public $user_system;
    public $user_deleted_id;
    public $user_id;
    public $rua;
    public $numero;
    public $bairro;
    public $data_admissao;
    public $data_demissao;
    public $data_nascimento;
    public $telefone1;
    public $telefone2;
    public $salario;
    public $perc_compra;
    public $cargo;
    public $pis;
    public $ctps;
    public $token_app;
    public $foto;
    public $deleted_at;

    protected $rules = [
        'name' => 'required|string|max:255',
        'usuario_id' => 'required|exists:users,id',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'empresa_id' => 'required|exists:empresas,id',
        'grupo_usuario_id' => 'required|exists:grupo_usuarios,id',
        'codigo_acesso' => 'nullable|string|max:50',
        'cpf' => 'nullable|string|max:14',
        'rg' => 'nullable|string|max:20',
        'sexo' => 'required|in:Masculino,Feminino',
        'status_id' => 'required|exists:statuses,id',
        'user_system' => 'nullable|in:Sim,Nao',
        'user_deleted_id' => 'nullable|exists:users,id',
        'user_id' => 'required|exists:users,id',
        'rua' => 'nullable|string|max:255',
        'numero' => 'nullable|string|max:10',
        'cep' => 'nullable|string|max:10',
        'bairro' => 'nullable|string|max:100',
        'cidade_id' => 'required|exists:cidades,id',
        'estado_id' => 'required|exists:estados,id',
        'data_admissao' => 'nullable|date',
        'data_demissao' => 'nullable|date',
        'data_nascimento' => 'nullable|date',
        'telefone1' => 'nullable|string|max:15',
        'telefone2' => 'nullable|string|max:15',
        'salario' => 'nullable|numeric|min:0',
        'perc_compra' => 'nullable|numeric|min:0|max:100',
        'cargo' => 'nullable|string|max:100',
        'pis' => 'nullable|string|max:20',
        'ctps' => 'nullable|string|max:20',
    ];

    public function mount($id)
    {
        $usuario = User::findOrFail($id);

        $this->usuario_id = $usuario->id;
        $this->name = $usuario->name;
        $this->email = $usuario->email;
        $this->empresa_id = $usuario->empresa_id;
        $this->grupo_usuario_id = $usuario->grupo_usuario_id;
        $this->codigo_acesso = $usuario->codigo_acesso;
        $this->cpf = $usuario->cpf;
        $this->rg = $usuario->rg;
        $this->sexo = $usuario->sexo;
        $this->status_id = $usuario->status_id;
        $this->user_system = $usuario->user_system;
        $this->user_deleted_id = $usuario->user_deleted_id;
        $this->user_id = $usuario->user_id;
        $this->rua = $usuario->rua;
        $this->numero = $usuario->numero;
        $this->cep = $usuario->cep;
        $this->bairro = $usuario->bairro;
        $this->cidade_id = $usuario->cidade_id;
        $this->estado_id = $usuario->estado_id;
        $this->data_admissao = $usuario->data_admissao;
        $this->data_demissao = $usuario->data_demissao;
        $this->data_nascimento = $usuario->data_nascimento;
        $this->telefone1 = $usuario->telefone01;
        $this->telefone2 = $usuario->telefone02;
        $this->salario = $usuario->salario;
        $this->perc_compra = $usuario->perc_compra;
        $this->cargo = $usuario->cargo;
        $this->pis = $usuario->pis;
        $this->ctps = $usuario->ctps;
    }

    public function atualizar()
    {
        $this->validate();

        User::where('id', $this->usuarioId)->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'empresa_id' => $this->empresa_id,
            'grupo_usuario_id' => $this->grupo_usuario_id,
            'codigo_acesso' => $this->codigo_acesso,
            'cpf' => $this->cpf,
            'rg' => $this->rg,
            'sexo' => $this->sexo,
            'status_id' => $this->status_id,
            'user_system' => $this->user_system,
            'user_deleted_id' => $this->user_deleted_id,
            'user_id' => $this->user_id,
            'rua' => $this->rua,
            'numero' => $this->numero,
            'cep' => $this->cep,
            'bairro' => $this->bairro,
            'cidade_id' => $this->cidades,
            'estado_id' => $this->estado_id,
            'data_admissao' => $this->data_admissao,
            'data_demissao' => $this->data_demissao,
            'data_nascimento' => $this->data_nascimento,
            'telefone1' => $this->telefone1,
            'telefone2' => $this->telefone2,
            'salario' => $this->salario,
            'perc_compra' => $this->perc_compra,
            'cargo' => $this->cargo,
            'pis' => $this->pis,
            'ctps' => $this->ctps
        ]);

        session()->flash('message', 'Usuario atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.usuario.alterar', [
            'estados' => $this->estados,
            'cidades' => $this->cidades,
            'statuses' => $this->statuses,
        ]);
    }

    public function buscarCidades() {
        $this->cidades = Cidades::where('estado_id', $this->estado_id)->get();
    }
}
