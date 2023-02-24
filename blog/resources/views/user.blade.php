@extends('master')

@section('content')

    <div class="card" style="width: 18rem;">
        @if($user->image !== 'image')
            <img src="/img/users/{{ $user->image }}" alt="{{ $user->firstName }}" class="card-img-top roundend"/>
        @else
            <img src="/img/images.jpeg" alt="{{ $user->firstName }}" class="card-img-top roundend"/>
        @endif
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
