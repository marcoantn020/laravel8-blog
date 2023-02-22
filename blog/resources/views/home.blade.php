@extends('master')

@section('content')

    <h1>Lista de Usuarios</h1>

    <ul>
        @foreach($users as $user)
            <li>
                <a href="{{ route('user.info', $user->id) }}">{{ $user->fullName }}</a> -
                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-info btn-sm">Editar</a>
                <small>Total de posts {{ $user->posts->count() }}</small>
{{--                <form action="{{ route('user.destroy', $user->id) }}" method="post">--}}
{{--                    @csrf--}}
{{--                    @method('delete')--}}
{{--                    <button type="submit" class="btn btn-danger btn-sm">Deletar</button>--}}
{{--                </form>--}}
            </li>
            <br>
        @endforeach
    </ul>

    {{ $users->links() }}

@endsection
