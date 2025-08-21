<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirect(route('dashboard'));
    }
}; ?>

<!-- Tela de Login -->
    <form wire:submit.prevent="login" class="space-y-6">
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
        <input wire:model="form.email" type="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="seu@email.com">
    </div>
    
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Senha</label>
        <div class="relative">
            <input wire:model="form.password" id="passwordInput" type="password" required class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="••••••••">
            <button type="button" onclick="togglePassword()" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700 transition-colors">
                <i id="eyeIcon" class="fas fa-eye"></i>
            </button>
        </div>
    </div>
    
    <div class="flex items-center justify-between">
        <label class="flex items-center">
            <input wire:model="form.remember" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
            <span class="ml-2 text-sm text-gray-600">Lembre-me</span>
        </label>
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" wire:navigate class="text-sm text-blue-600 hover:text-blue-800 transition-colors">Esqueceu a senha?</a>
        @endif
    </div>
    
    <button type="submit" class="w-full bg-gradient-to-r from-blue-500 to-purple-600 text-white py-3 rounded-lg font-semibold hover:from-blue-600 hover:to-purple-700 transition-all transform hover:scale-105">
        Entrar
    </button>
</form>