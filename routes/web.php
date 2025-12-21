<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

// Redireciona raiz para dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware('auth')->group(function () {

    // Dashboard
    Volt::route('dashboard', 'dashboard')->name('dashboard');
    Volt::route('inicio', 'dashboard')->name('inicio'); // inicio pode apontar pro mesmo do dashboard

    // Operações Principais
    Volt::route('caixa', 'caixa')->name('caixa');
    Volt::route('clientes', 'clientes')->name('clientes');

    // Estoque e Produtos
    Volt::route('produtos', 'produtos')->name('produtos');
    Volt::route('estoque', 'estoque')->name('estoque');
    Volt::route('fornecedores', 'fornecedores')->name('fornecedores');

    // Vendas e Funcionários
    Volt::route('vendas', 'vendas')->name('vendas');
    Volt::route('funcionarios', 'funcionarios')->name('funcionarios');
    Volt::route('delivery', 'delivery')->name('delivery');

    // Biblioteca e Configurações
    Volt::route('biblioteca', 'biblioteca')->name('biblioteca');
    Volt::route('configuracoes', 'configuracoes')->name('configuracoes');

    // Perfil
    Route::view('profile', 'profile')->name('profile');
});

// Inclui rotas de autenticação padrão do Laravel
require __DIR__.'/auth.php';
