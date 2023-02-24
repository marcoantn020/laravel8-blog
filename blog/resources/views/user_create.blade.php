@extends('master')

@section('content')


    @if(session()->has('success'))
        <x-alert key="success" :message="session()->get('success')" />
    @elseif(session()->has('error'))
        <x-alert key="danger" :message="session()->get('error')" />
    @endif

    <div class="col-md-10 offset-md-1 mt-5">
        <form action="{{ route('user.store') }}"
              enctype="multipart/form-data"
              method="post"
              class="d-flex flex-column align-items-center col-md-8 offset-md-2 mt-5">
            <h1>Criar usuario</h1>
            @csrf
            <div class="col-md-8">
                <label class="form-label" for="image"></label>
                <input class="form-control"
                       data-bs-toggle="tooltip" data-bs-placement="top" title="image: 225x225"
                       type="file"
                       name="image"
                       id="image"
                       value="{{ old('image') }}" />
                @if($errors->first('image'))
                    <small class="text-danger">{{ $errors->first('image') }}</small>
                @endif
            </div>
            <div class="col-md-8">
                <label class="form-label" for="firstName"> </label>
                <input class="form-control" type="text" name="firstName" id="firstName" value="{{ old('firstName') }}"  placeholder="Primeiro nome" />
                @if($errors->first('firstName'))
                    <small class="text-danger">{{ $errors->first('firstName') }}</small>
                @endif
            </div>

            <div class="col-md-8">
                <label class="form-label" for="lastName"> </label>
                <input class="form-control" type="text" name="lastName" id="lastName" value="{{ old('lastName') }}" placeholder="Sobrenome" />
                @if($errors->first('lastName'))
                    <small class="text-danger">{{ $errors->first('lastName') }}</small>
                @endif
            </div>

            <div class="col-md-8">
                <label class="form-label" for="email"></label>
                <input class="form-control" type="text" name="email" id="email" value="{{ old('email') }}" placeholder="E-mail" />
                @if($errors->first('email'))
                    <small class="text-danger">{{ $errors->first('email') }}</small>
                @endif
            </div>

            <div class="col-md-8">
                <label class="form-label" for="password"> </label>
                <input class="form-control" type="password" name="password" id="password" value="{{ old('password') }}"  placeholder="Senha" />
                @if($errors->first('password'))
                    <small class="text-danger">{{ $errors->first('password') }}</small>
                @endif
            </div>
            <br>
            <button type="submit" class="btn btn-info col-md-8">Criar</button>
        </form>
    </div>

@endsection
