<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin_user', [
            'title' => 'Profile ' . $user->fullname,
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        return view('admin_user_edit', [
            'title' => 'Editar usuario',
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|unique:users,email,'.$user->id,
        ]);
        $validated['image'] = UploadImageController::up($request);
        ($user->update($validated)) ?
            Session::flash('updated_success', 'Atualizado com sucesso.') :
            Session::flash('updated_error', 'Erro ao atualizar.');

        return back();
    }

}
