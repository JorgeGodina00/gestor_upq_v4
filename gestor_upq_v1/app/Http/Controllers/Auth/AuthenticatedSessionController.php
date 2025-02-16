<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }
    
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
   {
    $request->authenticate();
    $request->session()->regenerate();

    // Redirigir según el rol del usuario autenticado
    $role = Auth::user()->role;
    
    switch ($role) {
        case 'admin':
            return redirect()->intended(route('admin.dashboard'));
        case 'ptc':
            return redirect()->intended(route('ptc.dashboard'));
        case 'lector':
            return redirect()->intended(route('lector.dashboard'));
        default:
            Auth::logout();
            return redirect()->route('login')->with('error', 'Acceso no autorizado.');
    }
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
