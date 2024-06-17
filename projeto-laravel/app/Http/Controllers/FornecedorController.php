<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Vai exibir a tabela com todos os fornecedores
        return view('fornecedor.index', ['fornecedores' => Fornecedor::all()]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Vai mostrar o formulário de cadastro do cliente
        return view("fornecedor.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Salvar os dados na tabela de fornecedores
        Fornecedor::create([
            'nome' => $request->input('nome'),
            'cnpj' => $request->input('cnpj'),
            'endereco' => $request->input('endereco'),
            'telefone' => $request->input('telefone'),
        ]);

        return redirect()->route('fornecedor.index')->with('message', [
            'icon' => 'success',
            'title' => 'Concluído',
            'text' => 'Fornecedor cadastrado com sucesso!',
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Chama o formulário de edição de registro do fornecedor
        $fornecedor = Fornecedor::findOrFail($id);
        return view("fornecedor.edit", compact('fornecedor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->update([
            'nome' => $request->input('nome'),
            'cnpj' => $request->input('cnpj'),
            'endereco' => $request->input('endereco'),
            'telefone' => $request->input('telefone'),
        ]);

        return redirect()->route('fornecedor.index')->with('message', [
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
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->delete();

        return redirect()->route('fornecedor.index')->with('message', [
            'icon' => 'success',
            'title' => 'Excluído',
            'text' => 'Fornecedor excluído com sucesso!',
        ]);
    }

    public function delete($id)
    {
        $idInt = intval($id[1]);
        $fornecedor = Fornecedor::find($idInt);

        if (!$fornecedor) {
            return redirect()->route('fornecedor.index')->with('message', [
                'icon' => 'error',
                'title' => 'Ops...',
                'text' => 'Fornecedor não encontrado!',
            ]);
        }

        // Verifica se há violação de chave estrangeira ou outra restrição
        try {
            $fornecedor->delete();
            return redirect()->route('fornecedor.index')->with('message', [
                'icon' => 'success',
                'title' => 'Excluído',
                'text' => 'Fornecedor excluído com sucesso!',
            ]);
        } catch (\Exception $e) {
            return redirect()->route('fornecedor.index')->with('message', [
                'icon' => 'error',
                'title' => 'Ops...',
                'text' => 'Fornecedor possui produto atrelado a ele, por favor exclua os produtos atrelados e tente novamente!',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        return view("fornecedor.consult", compact('fornecedor'));
    }
}
