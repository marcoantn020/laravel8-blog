@extends('master')

@section('content')

    <h3>Post: {{ $post->title }}</h3>

    <p>{{ $post->content }}</p>
    <br>
    <p>{{ $post->author->fullName }}</p>
    <hr>
    @forelse($post->tags as $tag)
        <a href="{{ route('tag', $tag->id) }}">  {{ $tag->name }}</a><br>
    @empty
        Nenhuma tag cadastrada para este post
    @endforelse


@endsection
