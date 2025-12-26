<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Livewire::setUpdateRoute(function ($handle) {
    return Route::post(env('LIVEWIRE_UPDATE_URI'), $handle);
});
/*
|--------------------------------------------------------------------------
| Raiz
|--------------------------------------------------------------------------
| Sempre manda para o login
*/
Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Rotas protegidas (auth)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    /*
    | Dashboard / Início
    */
    Volt::route('dashboard', 'dashboard')->name('dashboard');
    Volt::route('inicio', 'dashboard')->name('inicio');

    /*
    | Operações Principais
    */
    Volt::route('caixa', 'caixas.caixa')->name('caixa');
    Volt::route('clientes', 'clientes.cliente')->name('clientes');

    /*
    | Estoque e Produtos
    */
    Volt::route('produtos', 'produtos.produto')->name('produtos');
    Volt::route('estoque', 'estoques.estoque')->name('estoque');
    Volt::route('fornecedores', 'fornecedores.fornecedor')->name('fornecedores');

    /*
    | Vendas e Funcionários
    */
    Volt::route('vendas', 'vendas.venda')->name('vendas');
    Volt::route('funcionarios', 'funcionarios.funcionario')->name('funcionarios');
    Volt::route('delivery', 'deliverys.delivery')->name('delivery');

    /*
    | Biblioteca e Configurações
    */
    Volt::route('biblioteca', 'bibliotecas.biblioteca')->name('biblioteca');
    Volt::route('configuracoes', 'configuracoes.configuracao')->name('configuracoes');

    /*
    | Perfil
    */
    Route::view('profile', 'profile')->name('profile');
});

/*
|--------------------------------------------------------------------------
| Autenticação (Volt)
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
