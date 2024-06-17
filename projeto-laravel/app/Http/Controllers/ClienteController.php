<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Vai exibir a tabela com todos os clientes
        $clientes = Cliente::all();
        return view("cliente.index", compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Vou mostrar o formulário de cadastro do cliente
        return view("cliente.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Salvar os dados na tabela de clientes
        Cliente::create([
            'nome' => $request->input('nome'),
            'cpf' => $request->input('cpf'),
            'email' => $request->input('email'),
            'endereco' => $request->input('endereco'),
            'telefone' => $request->input('telefone')
        ]);

        return redirect()->route('cliente.index')->with('message', [
            'icon' => 'success',
            'title' => 'Concluído',
            'text' => 'Cliente cadastrado com sucesso!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cliente = Cliente::findOrFail($id);
        return view("cliente.consult", compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //chama  o formulário de edição de registro do cliente
        $cliente = Cliente::findOrFail($id);
        return view("cliente.edit", compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update([
            'nome' => $request->input('nome'),
            'cpf' => $request->input('cpf'),
            'email' => $request->input('email'),
            'endereco' => $request->input('endereco'),
            'telefone' => $request->input('telefone')
        ]);

        return redirect()->route('cliente.index')->with('message', [
            'icon' => 'success',
            'title' => 'Concluído',
            'text' => 'Registro alterado com sucesso!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('cliente.index')->with('message', [
            'icon' => 'success',
            'title' => 'Excluído',
            'text' => 'Cliente excluído com sucesso!',
        ]);
    }

    public function delete(string $id)
    {
        //
        $cliente = Cliente::findOrFail($id);
        if (!$cliente) {
            return redirect()->route('cliente.index')->with('message', [
                'icon' => 'error',
                'title' => 'Ops...',
                'text' => 'Cliente não encontrado!',
            ]);
        }

        // Verifica se há violação de chave estrangeira ou outra restrição
        try {
            $cliente->delete();
            return redirect()->route('cliente.index')->with('message', [
                'icon' => 'success',
                'title' => 'Excluído',
                'text' => 'Cliente excluído com sucesso!',
            ]);
        } catch (\Exception $e) {
            return redirect()->route('cliente.index')->with('message', [
                'icon' => 'error',
                'title' => 'Ops...',
                'text' => 'Cliente possui dados atrelados a ele, por favor exclua os dados atrelados e tente novamente!',
            ]);
        }
    }
}
