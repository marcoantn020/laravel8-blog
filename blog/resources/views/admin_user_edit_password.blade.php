@extends('master')

@section('content')

    <h1>Atualizar Senha</h1>

    @if(session()->has('password_success'))
        <x-alert key="success" :message="session()->get('password_success')" />
    @elseif(session()->has('password_error'))
        <x-alert key="danger" :message="session()->get('password_error')" />
    @endif

    <form action="{{ route('password.update',$user->id) }}"
          method="post"
          enctype="multipart/form-data"
          class="d-flex flex-column align-items-center col-md-8 offset-md-2 mt-5">
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
        <br>
        <button type="submit" class="btn btn-success">Atualizar</button>

@endsection
