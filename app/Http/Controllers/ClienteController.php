<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function cadastrar()
    {
        $titulo = 'Cadastrar Cliente';
        return view('cadastrar_cliente', compact('titulo'));
    }

    public function cadastrarSubmit(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'cpf' => 'required|string'
        ]);

        // tratamento do cpf
        $cpf = preg_replace('/[^0-9]/', '', $request->input('cpf'));      
        $cliente = Cliente::create([
            'nome' => $request->nome,
            'cpf' => $cpf
        ]);

        if($cliente){
            return redirect()->route('venda');

        }else{
            return "ERRO";
        }

    }
}
