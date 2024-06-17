<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        //Vai exibir a tela para efetuar login
//        $users = UserController::all();
        return view("user.index", ['users' => User::all()]);
//        compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Vai mostrar o formulário de cadastro do cliente
        return view("user.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Salvar os dados na tabela de useres
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        return redirect()->route('user.index')->with('message', [
            'icon' => 'success',
            'title' => 'Concluído',
            'text' => 'Usuário cadastrado com sucesso!',
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Chama o formulário de edição de registro do user
        return view("user.edit", ['user' => User::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('user.index')->with('message', [
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
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('message', [
            'icon' => 'success',
            'title' => 'Excluído',
            'text' => 'Usuário excluído com sucesso!',
        ]);
    }

    public function delete($id)
    {
        $idInt = intval($id[1]);
        $user = User::find($idInt);

        if (!$user) {
            return redirect()->route('user.index')->with('message', [
                'icon' => 'error',
                'title' => 'Ops...',
                'text' => 'Usuário não encontrado!',
            ]);
        }

        // Verifica se há violação de chave estrangeira ou outra restrição
        try {
            $user->delete();
            return redirect()->route('user.index')->with('message', [
                'icon' => 'success',
                'title' => 'Excluído',
                'text' => 'Usuário excluído com sucesso!',
            ]);
        } catch (\Exception $e) {
            return redirect()->route('user.index')->with('message', [
                'icon' => 'error',
                'title' => 'Ops...',
                'text' => 'Usuário possui dados atrelados a ele, por favor exclua os dados atrelados e tente novamente!',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view("user.consult", compact('user'));
    }
}
