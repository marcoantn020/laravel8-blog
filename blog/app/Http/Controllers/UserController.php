<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    public function create()
    {
        return view('user_create', [
            'title' => 'Create user'
        ]);
    }


    public function store(UserRequest $request)
    {
        $validate = $request->validated();
        $saved = (new User())->insert($validate);

        ($saved) ?
            Session::flash('success', 'Cadastro realizado com sucesso.'):
            Session::flash('error', 'Erro ao efetuar cadastro.');
        return back();
    }


    public function show(User $user)
    {
        return view('user', [
            'title' => 'Usuario',
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('user_edit', [
            'title' => 'Editar usuario',
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|unique:users,email,'.$user->id
        ]);

        ($user->update($validated)) ?
            Session::flash('updated_success', 'Atualizado com sucesso.') :
            Session::flash('updated_error', 'Erro ao atualizar.');

        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }
}
