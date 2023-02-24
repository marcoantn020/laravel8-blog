@extends('master')

@section('content')


    <form action="{{ route('login.user.store') }}" method="post" class="d-flex flex-column align-items-center col-md-8 offset-md-2 mt-5">
        <h1>Login</h1>
        @csrf
        <div class="col-md-6">
            <label class="form-label" for="email"> </label>
            <input class="form-control" type="text" name="email" id="email" value="colby27@example.net" placeholder="E-mail"/>
            @if($errors->first('email'))
                <small class="text-danger">{{ $errors->first('email') }}</small>
            @endif
        </div>

        <div class="col-md-6">
            <label class="form-label" for="password">  </label>
            <input class="form-control" type="text" name="password" id="password" value="123456" placeholder="Password"/>
            @if($errors->first('password'))
                <small class="text-danger">{{ $errors->first('password') }}</small>
            @endif
        </div>

        <div class="col-md-6 mt-3 mb-3">
            <input type="checkbox" name="remember"/> remember
        </div>

        <button type="submit" class="btn btn-success col-md-6">Logar</button>
    </form>

@endsection
