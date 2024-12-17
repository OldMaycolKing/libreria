<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Para usar Auth::attempt

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Esta vista la crearemos a continuación
    }

    public function login(Request $request)
    {
        // Validar datos del formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // Autenticación exitosa
            $request->session()->regenerate();
            return redirect()->intended('/'); // Redirige a la página principal o a donde prefieras
        }

        // Autenticación fallida
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
