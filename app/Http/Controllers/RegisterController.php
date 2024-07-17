<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        // Verifica se o usuário está autenticado e se o cadastro está completo
        if (Auth::check() && Auth::user()->cadastroCompleto()) {
            return redirect('/dashboard'); // Redireciona se o cadastro estiver completo
        }

        return view('auth.register');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'endereco' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'endereco' => $request->endereco,
            'status' => $request->status,
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }
}
