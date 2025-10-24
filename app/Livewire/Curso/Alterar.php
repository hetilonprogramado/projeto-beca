<?php

namespace App\Livewire\Curso;

use App\Models\Curso;
use App\Models\Niveis;
use App\Models\Statues;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Alterar extends Component
{
    public $curso_id;
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
        'nome' => 'required|string|max:255',
        'descricao' => 'nullable|string',
        'status_id' => 'required|integer',
        'tipo_lancamento' => 'required|string|max:255',
        'hora_aula' => 'nullable|integer',
        'extracurricular' => 'nullable|boolean',
        'nivel_id' => 'required|integer',
        'user_deleted_id' => 'nullable|integer',
        'user_id' => 'required|integer',
        'curso_id' => 'required|integer',
    ];

    public function mount($id)
    {
        $curso = Curso::findOrFail($id);

        $this->curso_id = $curso->id;
        $this->nome = $curso->nome;
        $this->descricao = $curso->descricao;
        $this->status_id = $curso->status_id;
        $this->tipo_lancamento = $curso->tipo_lancamento;
        $this->hora_aula = $curso->hora_aula;
        $this->extracurricular = $curso->extracurricular;
        $this->nivel_id = $curso->nivel_id;
        $this->user_deleted_id = $curso->user_deleted_id;
        $this->user_id = Auth()->user()->id;
        $this->empresa_id = Auth()->user()->empresa_id ?? 1;

        $this->statuses = Statues::all();
        $this->niveis = Niveis::all();

    }

    public function atualizar()
    {
        $this->validate();

        $curso = Curso::find($this->curso_id);
        
        $curso-> empresa_id = Auth()->user()->empresa_id ?? 1;
        $curso-> nome = $this->nome;
        $curso-> descricao = $this->descricao;
        $curso-> status_id = $this->status_id;
        $curso-> tipo_lancamento = $this->tipo_lancamento;
        $curso-> hora_aula = $this->hora_aula;
        $curso-> extracurricular = $this->extracurricular;
        $curso-> nivel_id = $this->nivel_id;
        $curso-> user_deleted_id = $this->user_deleted_id;
        $curso-> user_id = Auth()->user()->id;
        $curso-> save();

        session()->flash('message', 'Curso atualizado com sucesso!');
    }

    public function cancelar()
    {
        $this->reset(); // limpa todos os campos
        session()->flash('message', 'Alterar cancelado!');
    }

    public function render()
    {
        return view('livewire.curso.alterar', [
            'niveis' => $this->niveis,
            'statuses' => $this->statuses,
        ]);
    }
}
