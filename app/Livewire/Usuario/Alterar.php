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
        'email' => 'required|email|max:255',
        'password' => 'nullable|string|min:6',
        'codigo_acesso' => 'nullable|string|max:50',
        'status_id' => 'required|integer',
        'cpf' => 'nullable|string|max:14',
        'rg' => 'nullable|string|max:20',
        'sexo' => 'nullable|string|max:10',
        'user_system' => 'nullable|boolean',
        'user_deleted_id' => 'nullable|integer',
        'rua' => 'nullable|string|max:255',
        'numero' => 'nullable|string|max:20',
        'cep' => 'nullable|string|max:10',
        'bairro' => 'nullable|string|max:100',
        'cidade_id' => 'nullable|integer',
        'estado_id' => 'nullable|integer',
        'data_admissao' => 'nullable|date',
        'data_demissao' => 'nullable|date',
        'data_nascimento' => 'nullable|date',
        'telefone1' => 'nullable|string|max:20',
        'telefone2' => 'nullable|string|max:20',
        'salario' => 'nullable|numeric',
        'perc_compra' => 'nullable|numeric',
        'cargo' => 'nullable|string|max:100',
        'pis' => 'nullable|string|max:20',
        'ctps' => 'nullable|string|max:20',
        'empresa_id' => 'nullable|integer',
        'grupo_usuario_id' => 'nullable|integer',
        'user_id' => 'nullable|integer',
    ];

    public function mount($id)
    {
        $usuario = User::findOrFail($id);

        // Popula todas as propriedades com os dados do usuário
        $this->fill([
            'usuario_id' => $usuario->id,
            'name' => $usuario->name,
            'email' => $usuario->email,
            'password' => '', // nunca exibe senha real
            'empresa_id' => $usuario->empresa_id,
            'grupo_usuario_id' => $usuario->grupo_usuario_id,
            'codigo_acesso' => $usuario->codigo_acesso,
            'cpf' => $usuario->cpf,
            'rg' => $usuario->rg,
            'sexo' => $usuario->sexo,
            'status_id' => $usuario->status_id,
            'user_system' => $usuario->user_system,
            'user_deleted_id' => $usuario->user_deleted_id,
            'user_id' => $usuario->user_id,
            'rua' => $usuario->rua,
            'numero' => $usuario->numero,
            'cep' => $usuario->cep,
            'bairro' => $usuario->bairro,
            'cidade_id' => $usuario->cidade_id,
            'estado_id' => $usuario->estado_id,
            'data_admissao' => $usuario->data_admissao,
            'data_demissao' => $usuario->data_demissao,
            'data_nascimento' => $usuario->data_nascimento,
            'telefone1' => $usuario->telefone1,
            'telefone2' => $usuario->telefone2,
            'salario' => $usuario->salario,
            'perc_compra' => $usuario->perc_compra,
            'cargo' => $usuario->cargo,
            'pis' => $usuario->pis,
            'ctps' => $usuario->ctps,
        ]);

        // Carrega listas de apoio
        $this->estados = Estados::all();
        $this->cidades = Cidades::where('estado_id', $usuario->estado_id)->get();
        $this->statuses = Statues::all();
    }

    public function atualizar()
    {
        $this->cpf = preg_replace('/\D/', '', $this->cpf);

        $this->validate();

        $usuario = User::find($this->usuario_id);
        
        $usuario-> name = $this->name;
        $usuario-> email = $this->email;
        $usuario-> password= $this->password;
        $usuario-> empresa_id = Auth()->user()->empresa_id ?? 1;
        $usuario-> grupo_usuario_id = $this->grupo_usuario_id;
        $usuario-> codigo_acesso = $this->codigo_acesso;
        $usuario-> cpf = $this->cpf;
        $usuario-> rg = $this->rg;
        $usuario-> sexo = $this->sexo;
        $usuario-> status_id = $this->status_id;
        $usuario-> user_system = $this->user_system;
        $usuario-> user_deleted_id = $this->user_deleted_id;
        $usuario-> user_id = Auth()->user()->id;
        $usuario->rua = $this->rua;
        $usuario->numero = $this->numero;
        $usuario->cep = $this->cep;
        $usuario->bairro = $this->bairro;
        $usuario->estado_id = $this->estado_id;
        $usuario->cidade_id = $this->cidade_id;
        $usuario->data_admissao = $this->data_admissao;
        $usuario->data_demissao = $this->data_demissao;
        $usuario->data_nascimento = $this->data_nascimento;
        $usuario->telefone1 = $this->telefone1;
        $usuario->telefone2 = $this->telefone2;
        $usuario->salario = $this->salario;
        $usuario->perc_compra = $this->perc_compra;
        $usuario->cargo = $this->cargo;
        $usuario->pis = $this->pis;
        $usuario->ctps = $this->ctps;
        $usuario->save();

        session()->flash('message', 'Usuario atualizado com sucesso!');
    }

    public function cancelar()
    {
        $this->reset(); // limpa todos os campos
        session()->flash('message', 'Alterar cancelado!');
    }

    public function render()
    {
        return view('livewire.usuario.alterar', [
            'estados' => $this->estados,
            'cidades' => $this->cidades,
            'statuses' => $this->statuses,
        ]);

        return view('livewire.usuario.foem');
    }


    public function buscarCidades() {
        $this->cidades = Cidades::where('estado_id', $this->estado_id)->get();
    }
}
