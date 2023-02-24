@extends('master')

@section('content')

    <div class="col-md-12">
        <h3 class="mt-3"> Tag: {{ $tag->name }}</h3>

        <p class="col-md-8"> Descricao: <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            Ab ad aspernatur blanditiis consequatur debitis deleniti deserunt,
            dicta ducimus excepturi explicabo facilis iste minima nesciunt nostrum
            quo rem reprehenderit sequi sunt. </p>

        <h5 class="mb-4">Posts com esta tag:</h5>

        <ul class="list-group">
            @forelse($tag->posts as $post)
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <img src="/img/images.jpeg" alt="{{ $post->author->firstName }}" id="image-user" class="rounded-circle"/>
                        <a href="{{ route('post', $post->slug) }}">  {{ $post->title }} </a>
                    </div>
                    <span class="badge bg-primary rounded-pill"> Total de posts: {{ $post->count() }}</span>
                </li>
            @empty
                Nenhuma post cadastrada para este post
            @endforelse
        </ul>
    </div>

@endsection
