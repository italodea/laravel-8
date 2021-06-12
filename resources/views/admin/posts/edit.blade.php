<h1>Editar post</h1>

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>
@endif

<form action="{{route('posts.update', $post->id)}}" method="post">
    @csrf
    @method('put')
    <input type="text" name="title" id="title" placeholder="Título" value="{{$post->title}}" />
    <textarea name="content" id="content" cols="30" rows="4" placeholder="Conteúdo" >
        {{$post->content}}
    </textarea>
    <button type="submit">Publicar </button>
</form>