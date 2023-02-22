<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PasswordController extends Controller
{
    public function update(Request $request, User $user)
    {
        $validate = $request->validate([
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user->password = bcrypt($validate['password']);
        $updated = $user->save();
        ($updated) ?
            Session::flash('password_success', 'Senha atualizada com sucesso.') :
            Session::flash('password_error', 'Erro ao atualizar senha.');

        return back();
    }
}
