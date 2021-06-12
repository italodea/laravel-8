<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){

        $posts = Post::all();

        return View('admin.posts.index',[
            'posts' => $posts
        ]
    );

}
    public function create(){

        return View('admin.posts.create');
    }

    public function store(StoreUpdatePost $request){
        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    public function show($id){
        //$post = Post::where("id", $id)->first();
        $post = Post::find($id);
        if(!$post){
            return redirect()->route("posts.index");
        }
        return View("admin.posts.show", compact('post'));
    }

    public function delete($id){
        $post = Post::find($id);
        if(!$post){
            return redirect()->route("posts.index");
        }

        $post->delete();

        return redirect()->route('posts.index');
    }

    public function edit($id){
        $post = Post::find($id);
        if(!$post){
            return redirect()->route("posts.index");
        }
        return View("admin.posts.edit", compact('post'));
    }

    public function update(StoreUpdatePost $request, $id){
        $post = Post::find($id);
        if(!$post){
            return redirect()->route("posts.index");
        }

        $post->update($request->all());

        return redirect()->route('posts.index');
    }
}
