<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function logout(): void{
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();

        redirect()->route('login');
    }
}
