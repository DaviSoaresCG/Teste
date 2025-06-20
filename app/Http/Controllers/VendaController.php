<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Parcela;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class VendaController extends Controller
{

    public function index()
    {
        
        $vendas = Venda::all();
        $clientes = Cliente::all();

        return view('vendas', compact('vendas', 'clientes'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $produtos = Produto::all();
        return view('venda', compact('clientes', 'produtos'));
    }

    public function formaDePagamento(Request $request)
    {

        // validação
        $request->validate([
            'cliente' => 'required',
            'produto' => 'required',
            'quantidade' => 'required',
            'valor_unitario' => 'required'
        ]);

        $valor_total = 0;
        $produtos = $request->produto;
        $cliente = $request->cliente;
        $quantidade = $request->quantidade;
        $valor_unitario = $request->valor_unitario;
        foreach ($request->valor_unitario as $i => $valor) {

            $valor_total += $request->quantidade[$i] * $valor;
        }

        return view('parcelas', compact('valor_total', 'produtos', 'cliente', 'valor_unitario', 'quantidade'));
    }

    public function finalizarVenda(Request $request)
    {

        // verificar se foi realizada as parcelas
        if(!$request->parcelas){
            return redirect()->route('venda.create')->withErrors(['parcelas' => 'Gere as parcelas']);
        }

        // verificar se as parcelas batem com o total da venda
        $total_parcelas = 0;
        for ($i = 0; $i < count($request->parcelas); $i++) {
            $total_parcelas += $request->parcelas[$i+1]['valor'];
        }

        // se as parcelas forem erradas
        if($total_parcelas != $request->venda_total){
            return redirect()->route('venda.create')->withErrors(['parcelas' => 'O valor das parcelas estão erradas']);
        }

        $venda = Venda::create([
            'cliente_id' => $request->cliente,
            'total' => $request->venda_total,
            'fucionario_id' => Auth::user()->id,
            'data_venda' => now()
        ]);

        $data = [];
        foreach ($request->produtos as $i => $id) {
            $data[$id] = [
                'quantidade' => $request->quantidade[$i],
                'valor_unitario' => $request->valor_unitario[$i],
            ];
        }

        $venda->produtos()->attach($data);

        for ($i = 0; $i < count($request->parcelas); $i++) {
            $parcela = Parcela::create([
                'venda_id' => $venda->id,
                'numero_parcela' => ($i+1),
                'valor' => $request->parcelas[$i+1]['valor'],
                'data_vencimento' => $request->parcelas[$i+1]['vencimento']
            ]);
        }
        
        return redirect()->route('venda');
    }

    public function edit($id)
    {
        $venda = Venda::with('cliente')->findOrFail($id);
        $clientes = Cliente::all();
        return view('edit', compact('venda', 'clientes'));
    }

    public function editSubmit(Request $request)
    {
        $venda = Venda::findOrFail($request->vendaId);
        $venda->cliente_id = $request->cliente;
        $venda->save();
        return redirect()->route('venda');
    }

    public function delete($id)
    {
        $venda = Venda::findOrFail($id);
        $venda->delete();
        $parcelas = Parcela::where('venda_id', $id);
        $parcelas->delete();

        return redirect()->route('venda');
    }
}
