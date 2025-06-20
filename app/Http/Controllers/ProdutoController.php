<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function cadastrar()
    {
        return view('cadastrar_produto');
    }

    public function cadastrarSubmit(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'valor' => 'required|string'
        ]);

        // tratamento do valor
        $valor_pro_banco = str_replace(['.', ','], ['', '.'], $request->valor);

        if (!is_numeric($valor_pro_banco)) {
            return redirect()->back()->withErrors(['valor' => 'valor invalido']);
        }

        $produto = new Produto();
        $produto->nome = $request->nome;
        $produto->valor = $valor_pro_banco;
        $produto->save();

        return redirect()->route('venda');
    }

    public function preco($id)
    {
        $produto = Produto::findOrFail($id);
        return response()->json(['valor' => $produto->valor]);
    }
}
