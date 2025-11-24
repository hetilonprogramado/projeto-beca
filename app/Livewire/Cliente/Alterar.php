<?php

namespace App\Livewire\Cliente;
use App\Models\Cliente;
use Carbon\Carbon;
use App\Models\Cidades;
use App\Models\Estados;
use App\Models\Matriculas;
use App\Models\Statues;
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

    public $empresa_id;
    public $cliente_id;
    public $nome;
    public $apelido;
    public $status_id;
    public $rua;
    public $numero;
    public $bairro;
    public $data_nasc;
    public $cpf;
    public $rg;
    public $email;
    public $sexo;
    public $user_deleted_id;
    public $registro_nascimento;
    public $nacionalidade;
    public $naturalidade;
    public $religiao;
    public $celular;

    public $statuses = [];
    public $matriculas = [];

    public function mountCep()
    {
        $this->estados = Estados::all();
        $this->cidades = Cidades::where('estado_id', Auth()->user()->estado_id)->get();
        $this->estado_id = Auth()->user()->estado_id;
        $this->cidade_id = Auth()->user()->cidade_id;
    }

    public function deletar($id){
        $matricula = Matriculas::find($id);

        if ($matricula) {
            $matricula->delete();
            session()->flash('message', 'Matricula deletado com sucesso!');
        } else {
            session()->flash('message', 'Matricula não encontrado!');
        }
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

    protected $rules = [
        'nome' => 'required|min:4',
        'apelido' => 'required|min:4',
        'status_id' => 'required|exists:statuses,id',
        'rua' => 'required|min:3',
        'numero' => 'required|numeric',
        'cep' => 'nullable|digits:8',
        'bairro' => 'nullable|min:3',
        'estado_id' => 'required|exists:estados,id',
        'cidade_id' => 'required|exists:cidades,id',
        'data_nasc' => 'nullable|date',
        'cpf' => 'nullable|digits_between:11,14',
        'rg' => 'nullable|min:3',
        'email' => 'nullable|email',
        'sexo' => 'required|in:Masculino,Feminino', // M for Masculino, F
        'user_deleted_id' => 'nullable|exists:users,id',
        'registro_nascimento' => 'nullable',
        'nacionalidade' => 'nullable',
        'naturalidade' => 'nullable',
        'religiao' => 'nullable',
        'celular' => 'nullable|min:9',
    ];

    public function mount($id)
    {
        $cliente = Cliente::findOrFail($id);

        $this->cliente_id = $cliente->id;
        $this->nome = $cliente->nome;
        $this->apelido = $cliente->apelido;
        $this->status_id = $cliente->status_id;
        $this->cpf = $cliente->cpf;
        $this->cep = $cliente->cep;
        $this->rua = $cliente->rua;
        $this->bairro = $cliente->bairro;
        $this->cidade_id = $cliente->cidade_id;
        $this->estado_id = $cliente->estado_id;
        $this->numero = $cliente->numero;
        $this->rg = $cliente->rg;
        $this->email = $cliente->email;
        $this->sexo = $cliente->sexo;
        $this->registro_nascimento = $cliente->registro_nascimento;
        $this->nacionalidade = $cliente->nacionalidade;
        $this->naturalidade = $cliente->naturalidade;
        $this->religiao = $cliente->religiao;
        $this->celular = $cliente->celular;
        $this->data_nasc = $cliente->data_nasc;

        $this->estados = Estados::all();
        $this->cidades = Cidades::where('estado_id', $this->estado_id)->get();
        $this->statuses = Statues::all();
        
        $this->matriculas = Matriculas::where('cliente_id', $cliente->id)
            ->with(['curso','turma']) // se quiser já carregar os relacionamentos
            ->get();

    }

    public function atualizar()
    {
        $this->cpf = preg_replace('/\D/', '', $this->cpf);

        $this->validate();

        $cliente = Cliente::find($this->cliente_id);
        
        $cliente-> empresa_id = Auth()->user()->empresa_id ?? 1;
        $cliente-> nome = $this->nome;
        $cliente-> apelido = $this->apelido;
        $cliente-> status_id = $this->status_id;
        $cliente-> user_id = Auth()->user()->id;
        $cliente->rua = $this->rua;
        $cliente->numero = $this->numero;
        $cliente->cep = $this->cep;
        $cliente->bairro = $this->bairro;
        $cliente->estado_id = $this->estado_id;
        $cliente->cidade_id = $this->cidade_id;
        $cliente->cpf = $this->cpf;
        $cliente->rg = $this->rg;
        $cliente->email = $this->email;
        $cliente->sexo = $this->sexo;
        $cliente->user_deleted_id = $this->user_deleted_id;
        $cliente->registro_nascimento = $this->registro_nascimento;
        $cliente->nacionalidade = $this->nacionalidade;
        $cliente->naturalidade = $this->naturalidade;
        $cliente->religiao = $this->religiao;
        $cliente->data_nasc = $this->data_nasc;
        $cliente->celular = $this->celular;
        $cliente->save();

        session()->flash('message', 'Cliente atualizado com sucesso!');
    }

    public function cancelar()
    {
        $this->reset(); // limpa todos os campos
        session()->flash('message', 'Alterar cancelado!');
    }

    public function render()
    {
        return view('livewire.cliente.alterar',[
            'estados' => $this->estados,
            'cidades' => $this->cidades,
            'cliente' => Cliente::find($this->cliente_id),
        ]);
    }

    public function buscarCidades() {
        $this->cidades = Cidades::where('estado_id', $this->estado_id)->get();
    }
}
