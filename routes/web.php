<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

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
    Volt::route('caixa', 'caixa')->name('caixa');
    Volt::route('clientes', 'clientes')->name('clientes');

    /*
    | Estoque e Produtos
    */
    Volt::route('produtos', 'produtos')->name('produtos');
    Volt::route('estoque', 'estoque')->name('estoque');
    Volt::route('fornecedores', 'fornecedores')->name('fornecedores');

    /*
    | Vendas e Funcionários
    */
    Volt::route('vendas', 'vendas')->name('vendas');
    Volt::route('funcionarios', 'funcionarios')->name('funcionarios');
    Volt::route('delivery', 'delivery')->name('delivery');

    /*
    | Biblioteca e Configurações
    */
    Volt::route('biblioteca', 'biblioteca')->name('biblioteca');
    Volt::route('configuracoes', 'configuracoes')->name('configuracoes');

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
