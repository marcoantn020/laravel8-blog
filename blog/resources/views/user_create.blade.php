@extends('master')

@section('content')

    <h1>Criar usuario</h1>

    @if(session()->has('success'))
        <x-alert key="success" :message="session()->get('success')" />
    @elseif(session()->has('error'))
        <x-alert key="danger" :message="session()->get('error')" />
    @endif

    <form action="{{ route('user.store') }}" method="post" class="flex-column">
        @csrf
        <div class="col-md-8">
            <label class="form-label" for="firstName"> Primeiro nome</label>
            <input class="form-control" type="text" name="firstName" id="firstName" value="{{ old('firstName') }}"  />
            {{ $errors->first('firstName') }}
        </div>

        <div class="col-md-8">
            <label class="form-label" for="lastName"> Ultimo nome</label>
            <input class="form-control" type="text" name="lastName" id="lastName" value="{{ old('lastName') }}"  />
            {{ $errors->first('lastName') }}
        </div>

        <div class="col-md-8">
            <label class="form-label" for="email"> E-mail</label>
            <input class="form-control" type="text" name="email" id="email" value="{{ old('email') }}"  />
            {{ $errors->first('email') }}
        </div>

        <div class="col-md-8">
            <label class="form-label" for="password"> senha</label>
            <input class="form-control" type="password" name="password" id="password" value="{{ old('password') }}"  />
            {{ $errors->first('password') }}
        </div>

        <button type="submit" class="btn btn-success">Criar</button>
    </form>

@endsection
