<center>
    <h1>{{ $post->title }}</h1>
</center>


<center>
    <h3>{{ $post->content }}</h3>
</center>

<form action="{{ route('posts.delete', $post->id)}}" method="post">
    @csrf
    <input type="hidden" name="_method" value="delete">
    <button type="submit">Deletar {{$post->title}}</button>
</form>