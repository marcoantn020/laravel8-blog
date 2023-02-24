@extends('master')

@section('content')


    @if(session()->has('success_update_post'))
        <x-alert key="success" :message="session()->get('success_update_post')" />

    @elseif(session()->has('error_update_post'))
        <x-alert key="danger" :message="session()->get('error_update_post')" />
    @endif

    <div class="col-md-10 offset-md-1 mt-5">
        <form action="{{ route('edit.update', $post->id) }}"
              enctype="multipart/form-data"
              method="post"
              class="d-flex flex-column align-items-center col-md-8 offset-md-2 mt-5">
            <h2> {{ $post->title }}
                @if(session()->has('success_update_post'))
                    <br>
                    <a class="fs-5" href="{{ route('post', $post->slug) }}">visualizar</a>
                @endif
            </h2>
            @csrf
            @method('put')
            <div class="col-md-8">
                <label class="form-label" for="image"></label>
                @if($post->image !== 'image')
                    <img src="/img/posts/{{ $post->image }}" alt="{{ $post->title }}" id="image-view" />
                @else
                    <img src="/img/images.jpeg" alt="{{ $post->title }}" id="image-view"/>
                @endif
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
                <input class="form-control" type="text" name="title" id="title" value="{{ $post->title }}"  placeholder="Titulo" />
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
                    placeholder="texto do post...">{{ $post->content }}</textarea>
                @if($errors->first('content'))
                    <small class="text-danger">{{ $errors->first('content') }}</small>
                @endif
            </div>

            <br>
            <button type="submit" class="btn btn-info col-md-8">Atualizar</button>
        </form>
    </div>

@endsection
