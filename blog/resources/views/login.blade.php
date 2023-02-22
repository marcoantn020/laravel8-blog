@extends('master')

@section('content')

    <h1>Login</h1>

    <form action="{{ route('login.store') }}" method="post" class="flex-column">
        @csrf
        <div class="col-md-8">
            <label class="form-label" for="email"> E-mail</label>
            <input class="form-control" type="text" name="email" id="email" value="marco@marco.com" />
            {{ $errors->first('email') }}
        </div>

        <div class="col-md-8">
            <label class="form-label" for="password"> Password </label>
            <input class="form-control" type="text" name="password" id="password" value="123456"/>
            {{ $errors->first('password') }}
        </div>

        <div class="col-md-3">
            <input type="checkbox" name="remember"/> remember
        </div>

        <button type="submit" class="btn btn-success">Logar</button>
    </form>

@endsection
