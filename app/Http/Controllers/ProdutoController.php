<?php

namespace App\Http\Controllers;
use App\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller{
    public function listarProdutos() {
        $produtos = Produto::all();
        return view('listarProdutos', ['produtos' => $produtos]);
    }

    public function cadastrarProduto() {
        return view('cadastrarProduto');
    }

    public function cadastrarProdutoR(Request $request) {
        Produto::create($request->all());

        return redirect()->route('listarProdutos')->with('message', 'Produto Cadastrado!');
    }

    public function deletarProduto($id) {
        $produto = Produto::find($id);
        $produto->delete();

        return redirect()->back()->with('message', 'Produto Deletado!');
    }

    public function editarProduto($id) {
        $produto = Produto::find($id);

        return view('editarProduto', ['produto' => $produto]);
    }

    public function editarProdutoR(Request $request) {
        $request->validate([
            'nome' => 'required|string',
            'valor' => 'required|integer',
        ]);

        $produto = Produto::find($request->id);

        $produto->nome = $request->nome;
        $produto->valor = $request->valor;

        $produto->save();

        return redirect()->route('listarProdutos')->with('message', 'Produto Editado!');
    }
}
