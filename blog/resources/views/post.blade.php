@extends('master')

@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div class="col-md-6">
                @if($post->image !== 'image')
                    <img src="/img/posts/{{ $post->image }}" alt="{{ $post->title }}" class="img-post"/>
                @else
                    <img src="/img/images.jpeg" alt="{{ $post->title }}" class="img-post"/>
                @endif
            </div>
            @auth
                <div class="col-md-7 mt-3 mb-3">
                    <a class="btn btn-info btn-sm" href="{{ route('edit.post', $post->id) }}">Editar</a>
                    <a class="btn btn-danger btn-sm"
                       href="{{ route('post.destroy', $post->id) }}"
                    >deletar</a>

                </div>
            @endauth
            <div class="col-md-8">
                <h2 class="mt-3 mb-4">{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
                <p> <b>Autor:</b> {{ $post->author->fullName }}</p>
                <hr>
                <h5>Tags:</h5>
                @forelse($post->tags as $tag)
                    <a href="{{ route('tag', $tag->id) }}">  {{ $tag->name }}</a><br>
                @empty
                <p>Nenhuma tag cadastrada para este post.</p>
                @endforelse
            </div>
        </div>
    </div>

@endsection
