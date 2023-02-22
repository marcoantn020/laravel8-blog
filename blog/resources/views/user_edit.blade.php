@extends('master')

@section('content')

    <h1>Atualizar usuario</h1>

    @if(session()->has('updated_success'))
        <x-alert key="success" :message="session()->get('updated_success')" />
    @elseif(session()->has('updated_error'))
        <x-alert key="danger" :message="session()->get('updated_error')" />
    @endif

    <form action="{{ route('user.update',$user->id) }}" method="post" class="flex-column">
        @csrf
        @method('put')
        <div class="col-md-8">
            <label class="form-label" for="firstName"> Primeiro nome</label>
            <input class="form-control" type="text" name="firstName" id="firstName" value="{{ $user->firstName }}"  />
            {{ $errors->first('firstName') }}
        </div>

        <div class="col-md-8">
            <label class="form-label" for="lastName"> Ultimo nome</label>
            <input class="form-control" type="text" name="lastName" id="lastName" value="{{ $user->lastName }}"  />
            {{ $errors->first('lastName') }}
        </div>

        <div class="col-md-8">
            <label class="form-label" for="email"> E-mail</label>
            <input class="form-control" type="text" name="email" id="email" value="{{ $user->email }}"  />
            {{ $errors->first('email') }}
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>

    <hr>
{{--    atualizar senha--}}
    <h1>Atualizar Senha</h1>

    @if(session()->has('password_success'))
        <x-alert key="success" :message="session()->get('password_success')" />
    @elseif(session()->has('password_error'))
        <x-alert key="danger" :message="session()->get('password_error')" />
    @endif

    <form action="{{ route('password.update',$user->id) }}" method="post" class="flex-column">
        @csrf
        @method('put')
        <div class="col-md-8">
            <label class="form-label" for="password"> Senha</label>
            <input class="form-control" type="password" name="password" id="password"/>
            {{ $errors->first('password') }}
        </div>

        <div class="col-md-8">
            <label class="form-label" for="password_confirmation"> Confirmar senha</label>
            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation"/>
            {{ $errors->first('password_confirmation') }}
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>

@endsection
