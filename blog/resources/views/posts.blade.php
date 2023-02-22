@extends('master')

@section('content')

    <h1>Lista de Posts</h1>

    <ul>

        @forelse($posts as $post)
            <li>
                <a href="{{ route('post', $post->slug) }}">{{ $post->title }}</a> - <small>{{ $post->author->fullName }}</small>
            </li>
            <br>
        @empty
            <li>Nenhum post encontrado - <a href="{{ route('posts') }}">todos os posts</a></li>
        @endforelse
    </ul>

    {{ $posts->appends(['search' => request()->query('search')])->links() }}

@endsection
