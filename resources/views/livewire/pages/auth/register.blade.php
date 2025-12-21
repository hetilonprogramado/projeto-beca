<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    
    // Flags para mostrar/esconder senha
    public bool $showPassword = false;
    public bool $showPasswordConfirmation = false;

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }

    // Alterna mostrar/esconder senha
    public function togglePassword(): void
    {
        $this->showPassword = !$this->showPassword;
    }

    public function togglePasswordConfirmation(): void
    {
        $this->showPasswordConfirmation = !$this->showPasswordConfirmation;
    }
}; 
?>

<div>
    <form wire:submit="register">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <input wire:model="name" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" type="text" name="name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <input wire:model="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4 relative">
            <x-input-label for="password" :value="__('Senha')" />

            <input wire:model="password" 
                   id="password" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all pr-10" 
                   type="{{ $showPassword ? 'text' : 'password' }}" 
                   name="password" 
                   required autocomplete="new-password" />

            <!-- Botão olho -->
            <button type="button" wire:click="togglePassword" class="absolute inset-y-0 right-2 flex items-center px-2 text-gray-600 hover:text-gray-900">
                <i class="{{ $showPassword ? 'fas fa-eye-slash' : 'fas fa-eye' }}"></i>
            </button>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4 relative">
            <x-input-label for="password_confirmation" :value="__('Confirme sua senha')" />

            <input wire:model="password_confirmation" 
                   id="password_confirmation" 
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all pr-10" 
                   type="{{ $showPasswordConfirmation ? 'text' : 'password' }}" 
                   name="password_confirmation" 
                   required autocomplete="new-password" />

            <!-- Botão olho -->
            <button type="button" wire:click="togglePasswordConfirmation" class="absolute inset-y-0 right-2 flex items-center px-2 text-gray-600 hover:text-gray-900">
                <i class="{{ $showPasswordConfirmation ? 'fas fa-eye-slash' : 'fas fa-eye' }}"></i>
            </button>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Link para login e botão registrar -->
        <div class="flex items-center justify-end mt-4">
            <a class="font-['Bree_Serif'] underline text-sm text-[#400d0a]
               hover:text-[#2a0b0b]
               rounded-md focus:outline-none
               focus:ring-2 focus:ring-[#400d0a]
               focus:ring-offset-2" href="{{ route('login') }}" wire:navigate>
                {{ __('Já está cadastrado(a)?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</div>
