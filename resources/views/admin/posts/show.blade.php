@extends('admin.layouts.app')

@section('title')
    Detalhes do post
@endsection

@section('content')
    <div class="header-image">
        <div class="title-post">
            <h1>{{ $post->title }}</h1>
        </div>
        <img src="{{ asset("storage/{$post->image}") }}" />
    </div>
    <form class="actions-post" action="{{ route('posts.delete', $post->id) }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="delete">
        <a class="edit-post-button" href="{{route('posts.edit', $post->id)}}">Editar</a><button type="submit" class="delete-post-button">Deletar</button>
    </form>
    <div class="container">
        <div class="text-container">
            <h3>{{ $post->content }}</h3>
        </div>
    </div>

@endsection
