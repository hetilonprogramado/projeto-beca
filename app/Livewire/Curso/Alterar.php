<?php

namespace App\Livewire\Curso;

use App\Models\Curso;
use App\Models\Niveis;
use App\Models\Statues;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Alterar extends Component
{
    public $id;
    public $user_id;
    public $nome;
    public $descricao;
    public $status_id;
    public $tipo_lancamento;
    public $hora_aula;
    public $extracurricular;
    public $nivel_id;
    public $user_deleted_id;

    public $statuses = [];
    public $niveis = [];

    protected $rules = [
        'nome' => 'required|min:4',
        'status_id' => 'required|exists:statuses,id',
        'tipo_lancamento' => 'required|string|max:100',
        'hora_aula' => 'required|integer|min:0',
        'extracurricular' => 'required|in:0,1',
        'nivel_id' => 'required|integer|exists:niveis,id',
        'descricao' => 'nullable|string',
        'user_deleted_id' => 'nullable|integer|exists:users,id',
    ];

    public function mount($id)
    {
        $this->id = $id;
        $this->getDados();
        $this->statuses = Statues::all();
        $this->niveis = Niveis::all();
    }

    public function atualizar()
    {
        try {
            $this->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Usuário: '.Auth::id().' Erro ao validar o Matricula: ' . $e->getMessage());
        }

        $curso = Curso::findOrFail($this->id);
        
        $curso->nome = $this->nome;
        $curso->descricao = $this->descricao;
        $curso->status_id = $this->status_id;
        $curso->tipo_lancamento = $this->tipo_lancamento;
        $curso->hora_aula = $this->hora_aula;
        $curso->extracurricular = $this->extracurricular;
        $curso->nivel_id = $this->nivel_id;
        $curso->user_id = $this->user_id;
        $curso->user_deleted_id = $this->user_deleted_id;
        $curso->save();

        $this->getDados();

        session()->flash('message', 'Curso atualizado com sucesso!');
    }

    public function cancelar()
    {
        $this->reset();
        session()->flash('message', 'Alteração cancelada!');
    }

    public function render()
    {
        return view('livewire.curso.alterar', [
            'niveis' => $this->niveis,
            'statuses' => $this->statuses,
        ]);
    }

    public function getDados(){
        $curso = Curso::findOrFail($this->id);
        $this->id = $curso->id;
        $this->nome = $curso->nome;
        $this->descricao = $curso->descricao;
        $this->status_id = $curso->status_id;
        $this->tipo_lancamento = $curso->tipo_lancamento;
        $this->hora_aula = $curso->hora_aula;
        $this->extracurricular = $curso->extracurricular;
        $this->nivel_id = $curso->nivel_id;
        $this->user_id = $curso->user_id;
        $this->user_deleted_id = $curso->user_deleted_id;
        
    }
}
