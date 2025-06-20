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
            'email' => 'required|email',
            'senha' => 'required'
        ], $mensagens);

        $credenciais = [
            'email' => $request->email,
            'password' => $request->senha
        ];

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();
            return redirect()->route('venda');
        }

        return  redirect()->back()->withErrors(['email' => 'Credenciais Inválidas']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function login()
    {
        return view('login');
    }

    public function cadastrar()
    {
        return view('cadastrar');
    }

    public function cadastrarSubmit(Request $request)
    {
        // validar as entradas
        $mensagens = [
            'required' => 'Preencha o Campo',
            'email.email' => 'Digite um email válido',
            'email.unique' => 'Ja existe um email'
        ];

        $request->validate([
            'email' => ['required', 'email', 'unique:funcionarios'],
            'senha' => ['required']
        ], $mensagens);

        $adminNovo = Funcionario::create([
            'email' => $request->email,
            'password' => Hash::make($request->senha)
        ]);

        return redirect()->route('login');
    }

    
}
