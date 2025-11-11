<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Livewire\Livewire;

Livewire::setUpdateRoute(function ($handle) {
    return Route::post(env('LIVEWIRE_UPDATE_URI'), $handle);
});
Route::view('/', 'welcome');
Route::middleware('auth')->group(function () {
    Volt::route('cliente', 'cliente.lista')->name('cliente');
    Volt::route('cliente/cadastrar', 'cliente.cadastrar')->name('cliente.cadastrar');
    Volt::route('cliente/editar/{id}', 'cliente.alterar')->name('cliente.alterar');
    
    Volt::route('empresa', 'empresa.lista')->name('empresa');
    Volt::route('empresa/cadastrar', 'empresa.cadastrar')->name('empresa.cadastrar');
    Volt::route('empresa/editar/{id}', 'empresa.alterar')->name('empresa.alterar');

    Volt::route('funcionario', 'funcionario.lista')->name('funcionario');
    Volt::route('funcionario/cadastrar', 'funcionario.cadastrar')->name('funcionario.cadastrar');
    Volt::route('funcionario/editar/{id}', 'funcionario.alterar')->name('funcionario.alterar');

    Volt::route('produtos', 'produtos.lista')->name('produtos');
    Volt::route('produtos/cadastrar', 'produtos.cadastrar')->name('produtos.cadastrar');
    Volt::route('produtos/editar/{id}', 'produtos.alterar')->name('produtos.alterar');

    Volt::route('matricula', 'matricula.lista')->name('matricula');
    Volt::route('matricula/cadastrar', 'matricula.cadastrar')->name('matricula.cadastrar');
    Volt::route('matricula/editar/{id}', 'matricula.alterar')->name('matricula.alterar');

    Volt::route('curso', 'curso.lista')->name('curso');
    Volt::route('curso/cadastrar', 'curso.cadastrar')->name('curso.cadastrar');
    Volt::route('curso/editar/{id}', 'curso.alterar')->name('curso.alterar');

    Volt::route('sala', 'sala.lista')->name('sala');
    Volt::route('sala/cadastrar', 'sala.cadastrar')->name('sala.cadastrar');
    Volt::route('sala/editar/{id}', 'sala.alterar')->name('sala.alterar');

    Volt::route('turma', 'turma.lista')->name('turma');
    Volt::route('turma/cadastrar', 'turma.cadastrar')->name('turma.cadastrar');
    Volt::route('turma/cadastrar/professor', 'turma.cadastrar-professor')->name('turma.cadastrar.professor');
    Volt::route('turma/editar/{id}', 'turma.alterar')->name('turma.alterar');

    Volt::route('usuario', 'usuario.lista')->name('usuario');
    Volt::route('usuario/cadastrar', 'usuario.cadastrar')->name('usuario.cadastrar');
    Volt::route('usuario/editar/{id}', 'usuario.alterar')->name('usuario.alterar');

    Volt::route('grupo-usuario', 'grupo-usuario.lista')->name('grupo-usuario');
    Volt::route('grupo-usuario/permissoes/{id}', 'grupo-usuario.permissoes')->name('grupo-usuario.permissoes');
    Volt::route('grupo-usuario/cadastrar', 'grupo-usuario.cadastrar')->name('grupo-usuario.cadastrar');
    Volt::route('grupo-usuario/editar/{id}', 'grupo-usuario.alterar')->name('grupo-usuario.alterar');

    Volt::route('produto', 'produtos.lista')->name('produto');
    Volt::route('grupo-produto', 'grupo-produto.lista')->name('grupo-produto');
    Volt::route('grupo-produto/cadastrar', 'grupo-produto.cadastrar')->name('grupo-produto.cadastrar');
    Volt::route('grupo-produto/editar/{id}', 'grupo-produto.alterar')->name('grupo-produto.alterar');

    Volt::route('disciplina', 'disciplina.lista')->name('disciplina');
    Volt::route('disciplina/cadastrar', 'disciplina.cadastrar')->name('disciplina.cadastrar');
    Volt::route('disciplina/editar/{id}', 'disciplina.alterar')->name('disciplina.alterar');

    Volt::route('grupo-disciplina/cadastrar', 'grupo-disciplina.cadastrar')->name('grupo-disciplina.cadastrar');
    Volt::route('grupo-disciplina', 'grupo-disciplina.lista')->name('grupo-disciplina');
    Volt::route('grupo-disciplina/editar/{id}', 'grupo-disciplina.alterar')->name('grupo-disciplina.alterar');    

    Volt::route('dashboard', 'dashboard')->name('dashboard');

    Route::view('profile', 'profile')->name('profile');
});

require __DIR__.'/auth.php';
