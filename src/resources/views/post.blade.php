@extends('components.layout')

@section('content')
    <h1>{{ $post->title }}</h1>
    <br>
    <span> By {{ $post->author->name }} </span>
    <br>
    <span>{{ $post->category->name }}</span>
    {{ $post->body }}
    <br>
    <a href="/posts">Go Back</a>
@endsection
