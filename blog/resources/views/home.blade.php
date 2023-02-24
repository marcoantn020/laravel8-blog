@extends('master')

@section('content')

    <h2 class="mb-2 mt-4">Lista de Usuarios</h2>

    <ul class="list-group">
        @foreach($users as $user)
            <li class="list-group-item d-flex justify-content-between align-items-start" style="height: 70px">
                <div class="ms-2 me-auto">
                    @if($user->image !== 'image')
                    <img src="/img/users/{{ $user->image }}" alt="{{ $user->firstName }}" id="image-user" class="rounded-circle"/>
                    @else
                        <img src="/img/images.jpeg" alt="{{ $user->firstName }}" id="image-user" class="rounded-circle"/>
                    @endif
                    <a href="{{ route('user.info', $user->id) }}">{{ $user->fullName }}</a>
                </div>
                <span class="badge bg-primary rounded-pill"> Total de posts: {{ $user->posts->count() }}</span>
            </li>
        @endforeach
    </ul>
    <br>
    {{ $users->links() }}

@endsection
