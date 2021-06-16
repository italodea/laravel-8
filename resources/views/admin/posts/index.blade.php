@extends('admin.layouts.app')
@section('title')
Listagem dos posts
@endsection

@section('content')
<h1>Posts</h1>

<form action="{{route('posts.search')}}" method="post">
    @csrf
    <div class="wrap">
   <div class="search">
      <input type="text" class="searchTerm" name="search" id="search" placeholder="What are you looking for?">
      <button type="submit" class="searchButton">
        <i class="ms-Icon ms-Icon--Search" aria-hidden="true"></i>
     </button>
   </div>
</div>
</form>

<a href="{{route('posts.create')}}">Cadastrar novo post</a>
<center>
    <div class="posts">
        @foreach ($posts as $post)
        <div class="card">
            <div class="card-image">
                <img src="{{asset("storage/{$post->image}")}}" alt="{{$post->title}}">
            </div>
           <div class="card-title">
            <a href="{{route('posts.show', $post->id)}}">{{$post->title}} </a>
           </div>
           <div class="card-content">
               <p>{{$post->content}}</p>
           </div>
           <div class="card-actions">
            <a href="{{route('posts.show', $post->id)}}">Ver detalhes</a>
           </div>
        </div>
    
    @endforeach
    </div>
</center>



<hr>
@if (isset($filters))
    {{$posts->appends($filters)->links()}}
@else
    {{$posts->links()}}
    
@endif

@endsection