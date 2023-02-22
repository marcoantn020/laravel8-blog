<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $users = User::with('posts')->paginate(5);
        return view('home', [
            'title' => 'Home',
            'users' => $users
        ]);
    }
}
