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
        <label class="font-['Bree_Serif'] block text-sm font-medium text-[#400d0a] mb-2">Email</label>
        <input wire:model="form.email" type="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="seu@email.com">
    </div>

    <div>
        <label class="font-['Bree_Serif'] block text-sm font-medium text-[#400d0a] mb-2">Senha</label>
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
            <span class="ml-2 text-sm text-[#400d0a] font-['Bree_Serif']">Lembre-me</span>
        </label>
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" wire:navigate class="font-['Bree_Serif'] text-sm text-[#400d0a] hover:text-[#2a0b0b] transition-colors">Esqueceu a senha?</a>
        @endif
        <a href="{{ route('register') }}" wire:navigate class="font-['Bree_Serif'] text-sm text-[#400d0a] hover:text-[#2a0b0b] transition-colors">Fazer cadastro</a>
    </div>
    

    <button type="submit" wire:target="login" wire:loading.att="disabled" class="w-full bg-[#3b0f0f] text-white py-3 rounded-lg font-semibold
           hover:bg-[#2a0b0b] transition-all transform hover:scale-105">
        <span wire:loading.remove wire:target="login">Entrar</span>
        <i class="fas fa-spinner fa-spin mr-2" wire:loading wire:target="login"></i>
        <span wire:loading wire:target="login">Entrando...</span>
    </button>
    @error('form.email')
    <div wire:loading.remove wire.att="hidden" wire:target="login" class="toast-message fixed top-4 right-4 px-6 py-4 rounded-lg shadow-lg z-50 flex items-center space-x-3 message-enter bg-red-500 text-white"
        x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
        <i class="fas fa-exclamation-circle text-lg"></i>
        <span class="font-medium">{{ $message }}</span>
    </div>
    @enderror
</form>
