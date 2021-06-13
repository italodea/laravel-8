@extends('admin.layouts.app')

@section('title')
Novo Post
@endsection 

@section('content')
<h1>Cadastrar novo post</h1>

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif

<form action="{{route('posts.store')}}" method="post">
    @include('admin.posts._partials.form')
</form>
@endsection