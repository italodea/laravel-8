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
    <div style="display: flex">
        <div class="info-area">
            <i class="ms-Icon ms-Icon--ViewDashboard" aria-hidden="true"></i><p>7 Cômodos</p>
            <i class="ms-Icon ms-Icon--BacklogBoard" aria-hidden="true"></i><p>Condominio</p>
            <i class="ms-Icon ms-Icon--Crop" aria-hidden="true"></i><p>29M²</p>
        </div>
        <form class="actions-post" action="{{ route('posts.delete', $post->id) }}" method="post">
            @csrf
            <input type="hidden" name="_method" value="delete">
            <a class="edit-post-button" href="{{route('posts.edit', $post->id)}}">Editar</a><button type="submit" class="delete-post-button">Deletar</button>
        </form>
    </div>
    <center>
        <div class="container">
            <div class="text-container">
                <h3>{{ $post->content }}</h3>
            </div>
        </div>
    </center>

@endsection
