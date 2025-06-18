<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginSubmit(Request $request)
    {
        // validar as entradas
        $mensagens = [
            'required' => 'Preencha o Campo',
            'email.email' => 'Digite um email válido'
        ];

        $request->validate([
            'email' => ['required', 'email'],
            'senha' => ['required']
        ], $mensagens);

        $credenciais = [
            'email' => $request->email,
            'password' => $request->senha
        ];

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return  redirect()->back()->withErrors(['email' => 'Credenciais Inválidas']);
    }

    public function login()
    {
        return view('login');
    }

    
}
