@extends('master')

@section('content')

    <h1>Seus Posts</h1>

    <div id="post-container" class="col-md-12">
        <div id="cards-container" class="row">
            @forelse($posts as $post)
                <div class="card col-md-3">
                    @if($post->image !== 'image')
                        <img src="/img/posts/{{ $post->image }}" alt="{{ $post->title }}" />
                    @else
                        <img src="/img/images.jpeg" alt="{{ $post->title }}"/>
                    @endif
                    <div class="card-body" id="card-body">
                        <a class="card-title text-center" href="{{ route('post', $post->slug) }}">{{ $post->title }}</a>
                        <p id="name-author"> {{ $post->author->fullName }} -
                            <small>{{ date('d/m/Y', strtotime($post->created_at)) }}</small></p>
                    </div>
                </div>
            @empty
        </div>
        <li>Nenhum post encontrado - <a href="{{ route('posts') }}">todos os posts</a></li>
        @endforelse
        {{ $posts->links() }}
    </div>

@endsection
