@extends('admin.layouts.app')
@section('title')
Listagem dos posts
@endsection

@section('content')
<h1>Posts</h1>

<form action="{{route('posts.search')}}" method="post">
    @csrf
    <input type="text" name="search" id="search" placeholder="Pesquisar">
    <button type="submit">Pesquisar</button>
</form>

<a href="{{route('posts.create')}}">Cadastrar novo post</a>
@foreach ($posts as $post)
    <p>{{$post->title}} - <a href="{{route('posts.show', $post->id)}}">Ver detalhes</a> | <a href="{{route('posts.edit', $post->id)}}">Editar</a> </p>
@endforeach

<hr>
@if (isset($filters))
    {{$posts->appends($filters)->links()}}
@else
    {{$posts->links()}}
    
@endif

@endsection