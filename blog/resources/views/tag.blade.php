@extends('master')

@section('content')

    <h3>Tag: {{ $tag->name }}</h3>

    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab ad aspernatur blanditiis consequatur debitis deleniti deserunt, dicta ducimus excepturi explicabo facilis iste minima nesciunt nostrum quo rem reprehenderit sequi sunt. </p>

    @forelse($tag->posts as $post)
        <a href="{{ route('post', $post->slug) }}">  {{ $post->title }}</a><br>
    @empty
        Nenhuma post cadastrada para este post
    @endforelse


@endsection
