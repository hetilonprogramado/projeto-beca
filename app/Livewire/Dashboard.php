<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public function mount()
    {
        session()->put('pagina-titulo', 'Dashboard');
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
