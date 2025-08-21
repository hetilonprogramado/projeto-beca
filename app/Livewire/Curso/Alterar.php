<?php

namespace App\Livewire\Curso;

use App\Models\Curso;
use Livewire\Component;

class Alterar extends Component
{
    public $empresa_id;
    public $curso_id;
    public $user_id;
    public $nome;
    public $status_id;
    public $tipo_lancamento;
    public $hora_aula;
    public $extracurricular;
    public $nivel_id;
    public $user_deleted_id;

    protected $rules = [
        'empresa_id' => 'required|exists:empresas,id',
        'nome' => 'required|min:4',
        'status_id' => 'required|exists:statuses,id',
        'tipo_lancamento' => 'required|in:Mensal,Anual', // Mensal ou Anual
        'hora_aula' => 'required|numeric|min:1', // Minimum 1
        'extracurricular' => 'required|in:Sim,Nao', // Sim ou Nao
        'nivel_id' => 'required|exists:niveis,id',
        'user_deleted_id' => 'nullable|exists:users,id',
    ];

    public function mount($id)
    {
        $curso = Curso::findOrFail($id);

        $this->curso_id = $curso->id;
        $this->nome = $curso->nome;
        $this->tipo_lancamento = $curso->tipo_lancamento;
        $this->hora_aula = $curso->hora_aula;
        $this->extracurricular = $curso->extracurricular;
    }

    public function atualizar()
    {
        $this->validate();

        Curso::where('id', $this->cursoId)->update([
            'nome' => $this->nome,
            'tipo_lancamento' => $this->tipo_lancamento,
            'hora_aula' => $this->hora_aula,
            'extracurricular' => $this->extracurricular
        ]);

        session()->flash('message', 'Curso atualizado com sucesso!');
    }

    public function render()
    {
        return view('livewire.curso.alterar');
    }
}
