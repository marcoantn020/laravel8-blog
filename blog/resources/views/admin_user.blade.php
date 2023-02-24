@extends('master')

@section('content')

    <div class="card col-md-6">
        @if($user->image !== 'image')
            <img src="/img/users/{{ $user->image }}" alt="{{ $user->firstName }}" class="card-user-admin card-img-top roundend"/>
        @else
            <img src="/img/images.jpeg" alt="{{ $user->firstName }}" class="card-user-admin card-img-top roundend"/>
        @endif

        @auth
            <div class="col-md-7 mt-3 mb-3">
                <a class="btn btn-info btn-sm" href="{{ route('user.edit', $user->id) }}">Editar</a>
                <a class="btn btn-warning btn-sm"
                   href="{{ route('password.update', $user->id) }}"
                >atualizar senha</a>

            </div>
        @endauth

        <div class="card-body">
            <h5 class="card-title">{{ $user->fullName }}</h5>
            <p class="card-text"><b>E-mail:</b> {{ $user->email }}</p>
            <hr>
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
        </div>
    </div>

@endsection
