@extends('admin.layouts.app')

@section('title')
    Editar post
@endsection

@section('content')
<h1>Editar post</h1>

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif

<form action="{{route('posts.update', $post->id)}}" method="post">
    @method('put')
    @include('admin.posts._partials.form')
</form>
@endsection