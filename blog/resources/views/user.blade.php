@extends('master')

@section('content')

    <h3>Usuario: {{ $user->fullName }}</h3>

    <p> Primeiro nome: {{ $user->firstName }}</p>
    <p> Ultimo nome: {{ $user->lastName }}</p>
    <p> E-mail: {{ $user->email }}</p>
    <br>
    @if($user->posts->count() > 0)
    <h4>Posts</h4>
        <ul>
            @foreach($user->posts as $post)
                <li>
                    <a href="{{ route('post', $post->slug) }}">{{ $post->title }}</a>
                </li>
            @endforeach
        </ul>
    @endif


@endsection
