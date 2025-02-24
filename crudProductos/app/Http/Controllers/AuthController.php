<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Muestra el formulario de login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Procesa el login
    public function login(Request $request)
    {
        // Valida los datos del formulario
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Intenta autenticar al usuario
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // Regenera la sesión para evitar ataques de fijación de sesión
            $request->session()->regenerate();

            // Redirige al dashboard
            return redirect()->intended(route('dashboard'));
        }

        // Si las credenciales no son correctas, regresa con un error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }
}
