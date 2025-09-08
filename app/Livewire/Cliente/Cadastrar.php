<?php

namespace App\Livewire\Cliente;

use Livewire\Component;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Cidades;
use App\Models\Estados;
use Illuminate\Support\Facades\Http;
use Pest\ArchPresets\Custom;
use Illuminate\Support\Facades\Auth;
use DB;

class Cadastrar extends Component
{
    public $cep;
    public $estado_id;
    public $cidade_id;
    public $estados = [];
    public $cidades = [];

    public function mount()
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

            $this->cidade_id = $cidades->id;
            $this->estado_id = $cidades->estado_id;
            $this->buscarCidades();
        }
    }


    public $empresa_id;
    public $nome;
    public $apelido;
    public $status_id;
    public $user_id;
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

    protected function validarDados(): array{
        $rules = [
            'empresa_id' => 'required|exists:empresas,id',
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
            'cpf' => 'nullable|digits_between:11,14',// 11 digits for CPF, 14 for CNPJ
            'rg' => 'nullable|min:3',
            'email' => 'nullable|email',
            'sexo' => 'required|in:Masculino,Feminino', // M for Masculino, F
            'user_deleted_id' => 'nullable|exists:users,id',
            'registro_nascimento' => 'nullable',
            'nacionalidade' => 'nullable',
            'naturalidade' => 'nullable',
            'religiao' => 'nullable',
            'celular' => 'nullable|min:9',
            'user_id' => 'required|exists:users,id',
        ];

        return $this->validate($rules);
    }

    public function salvar() {
        // --- Formatação dos campos ---
        $this->cep = preg_replace('/\D/', '', $this->cep);
        $this->cpf = preg_replace('/\D/', '', $this->cpf);

       // $this->validate();
        
        Cliente::create([
            'empresa_id' => 1,
            'nome' => $this->nome,
            'apelido' => $this->apelido,
            'status_id' => 1,
            'user_id' => 1,
            'rua' => $this->rua,
            'numero' => $this->numero,
            'cep' => $this->cep,
            'bairro' => $this->bairro,
            'estado_id' => $this->estado_id,
            'cidade_id' => $this->cidade_id,
            'data_nasc' => Carbon::parse($this->data_nasc)->format('Y-m-d'),
            'cpf' => $this->cpf,
            'rg' => $this->rg,
            'email' => $this->email,
            'sexo' => $this->sexo,
            'user_deleted_id' => null,
            'registro_nascimento' => $this->registro_nascimento,
            'nacionalidade' => $this->nacionalidade,
            'naturalidade' => $this->naturalidade,
            'religiao' => $this->religiao,
            'celular' => $this->celular,
            'user_id' => Auth()->user()->id,
        ]);
        // Limpa os campos do formulário
        $this->reset();
        session()->flash('message', 'Empresa cadastrado com sucesso!');

    }

    // public function salvar() {
    //     // --- Formatação dos campos ---
    //     $this->cep = preg_replace('/\D/', '', $this->cep);
    //     $this->cpf = preg_replace('/\D/', '', $this->cpf);
    //     // 1. Validação separada em método dedicado
    //    $validatedData = $this->validarDados();

    //    $validatedData['empresa_id'] = Auth()->user()->empresa_id;
    //    $validatedData['user_id'] = Auth()->user()->id;

    //     try {
    //         // 2. Transação para garantir consistência
    //         DB::transaction(function () use ($validatedData) {
    //             // 3. Operação de create simplificada
    //             $cliente = Cliente::Create(
    //                 $validatedData
    //             );
    //         });

    //         // 5. Feedback para o usuário
    //         session()->flash('message', 'Cliente cadastrado com sucesso!');

    //         // 6. Limpa campos
    //         $this->reset();

    //     } catch (\Exception $e) {
    //         // 7. Tratamento de erro adequado
    //         session()->flash('error', 'Erro ao salvar cliente: ' . $e->getMessage());
    //         Log::error('Erro ao salvar cliente: ' . $e->getMessage());
    //     }

    // }

    public function render(){
        return view('livewire.cliente.cadastrar', [
            'estados' => $this->estados,
            'cidades' => $this->cidades,
        ]);
        return view('livewire.cliente.form');
    }

    public function buscarCidades() {
        $this->cidades = Cidades::where('estado_id', $this->estado_id)->get();
    }
}
