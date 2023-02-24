<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('posts')
            ->orderBy('id', 'desc')
            ->paginate(7);
        return view('home', [
            'title' => 'Home',
            'users' => $users
        ]);
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
        $validate['image'] = UploadImageController::up($request);
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

}
