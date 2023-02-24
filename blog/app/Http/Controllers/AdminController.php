<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $posts = Post::where('user_id', $user_id)
            ->with('author')
            ->orderBy('id', 'desc')
            ->paginate(8);

        return view('admin_user_posts', [
            'title' => 'Admin Usuario',
            'posts' => $posts
        ]);
    }

    public function edit(Post $post)
    {
        return view('admin_user_post_edit', [
            'title' => 'Editar post',
            'post' => $post
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $validate = $request->validate([
            'title' => 'required|min:3',
            'content' => 'required|min:100',
            'image' => 'mimes:jpg,png,jpeg|max:2048'
        ]);

        $validate['image'] = UploadImageController::up($request, 'posts');
        if($validate['image'] === null) {
            unset($validate['image']);
        }

        $validate['slug'] = Str::slug($validate['title']);

        $saved = $post->update($validate);
        ($saved) ?
            Session::flash('success_update_post', 'Post atualizado com sucesso.'):
            Session::flash('error_update_post', 'Erro ao atualizar registro.');
        return back();
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect(route('profile.posts'));
    }

    public function create()
    {
        return view('admin_user_post_create', [
            'title' => 'Criar post'
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|min:3',
            'content' => 'required|min:100',
            'image' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $validate['image'] = UploadImageController::up($request, 'posts');
        if($validate['image'] === null) {
            unset($validate['image']);
        }

        $validate['slug'] = Str::slug($validate['title']);
        $validate['user_id'] = auth()->user()->id;

        $saved = Post::create($validate);
        ($saved) ?
            Session::flash('success_create_post', 'Post criado com sucesso.'):
            Session::flash('error_create_post', 'Erro ao criar registro.');
        return back();
    }
}
