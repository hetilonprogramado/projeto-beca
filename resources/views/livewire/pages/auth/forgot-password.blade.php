<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // Envia o link de redefinição
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));
            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; 
?>

<div>
    <div class="mb-4 text-sm text-[#400d0a] font-['Bree_Serif']">
        {{ __('Esqueceu sua senha? Sem problemas. Basta nos informar seu endereço de e-mail e enviaremos um link para redefinição de senha, que permitirá que você escolha uma nova.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <input wire:model="email" id="email" class="w-full px-4 py-1 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" type="email" name="email" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex flex-col items-start mt-4 space-y-2">
            <!-- Botão de envio -->
            <x-primary-button class="w-full">
                {{ __('Enviar link de redefinição') }}
            </x-primary-button>

            <!-- Link de voltar para login -->
            <a href="{{ route('login') }}" class="text-sm text-[#400d0a] hover:text-[#2a0b0b] font-['Bree_Serif'] transition-colors">
                &larr; Voltar para login
            </a>
        </div>
    </form>
</div>
