@extends('master')

@section('content')


    @if(session()->has('success_create_post'))
        <x-alert key="success" :message="session()->get('success_create_post')" />
    @elseif(session()->has('error_create_post'))
        <x-alert key="danger" :message="session()->get('error_create_post')" />
    @endif

    <div class="col-md-10 offset-md-1 mt-5">
        <form action="{{ route('post.store') }}"
              enctype="multipart/form-data"
              method="post"
              class="d-flex flex-column align-items-center col-md-8 offset-md-2 mt-5">
            <h1>Criar novo post</h1>
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
                <label class="form-label" for="title"> </label>
                <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}"  placeholder="Titulo" />
                @if($errors->first('title'))
                    <small class="text-danger">{{ $errors->first('title') }}</small>
                @endif
            </div>

            <div class="col-md-8">
                <label class="form-label" for="content"> </label>
                <textarea
                    name="content"
                    id="content"
                    class="form-control"
                    rows="10"
                    placeholder="texto do post...">{{ old('content') }}</textarea>
                @if($errors->first('content'))
                    <small class="text-danger">{{ $errors->first('content') }}</small>
                @endif
            </div>

            <br>
            <button type="submit" class="btn btn-info col-md-8">Criar</button>
        </form>
    </div>

@endsection
