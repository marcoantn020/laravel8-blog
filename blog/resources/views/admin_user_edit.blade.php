@extends('master')

@section('content')

    @if(session()->has('updated_success'))
        <x-alert key="success" :message="session()->get('updated_success')" />
    @elseif(session()->has('updated_error'))
        <x-alert key="danger" :message="session()->get('updated_error')" />
    @endif

    <form action="{{ route('user.update',$user->id) }}"
          enctype="multipart/form-data"
          method="post"
          class="d-flex flex-column align-items-center col-md-8 offset-md-2 mt-5">
        @csrf
        @method('put')
        <h1 class="mb-4 mt-3">Atualizar usuario</h1>

        <div class="col-md-8">
            @if($user->image !== 'image')
                <img src="/img/users/{{ $user->image }}" alt="{{ $user->firstName }}" style="height: 80px"/>
            @else
                <img src="/img/images.jpeg" alt="{{ $user->firstName }}" height="height: 80px"/>
            @endif
        </div>
        <div class="col-md-8 mb-2">
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
        <br>
        <button type="submit" class="btn btn-success col-md-8">Atualizar</button>
    </form>

@endsection
