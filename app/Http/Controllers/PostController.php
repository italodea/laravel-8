<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){

        $posts = Post::latest()->paginate(15);

        return View('admin.posts.index',[
            'posts' => $posts
        ]
    );

}
    public function create(){

        return View('admin.posts.create');
    }

    public function store(StoreUpdatePost $request){
        $data = $request->all();
        if($request->image->isValid()){
            $nameFile = Str::of($request->title)->slug('-').'.'.$request->image->getClientOriginalExtension();
            $file = $request->image->storeAs('public/posts',$nameFile);
            $file = str_replace('public/','',$file);
            $data['image'] = $file;
        }
        Post::create($data);
        return redirect()->route('posts.index')->with('message','Novo post criado');
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
        if(Storage::exists($post->image)){
            Storage::delete($post->image);
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
        $data = $request->all();

        if($request->image && $request->image->isValid()){
            if(Storage::exists($post->image)){
                Storage::delete($post->image);
            }
            $nameFile = Str::of($request->title)->slug('-').'.'.$request->image->getClientOriginalExtension();
            $file = $request->image->storeAs('public/posts',$nameFile);
            $file = str_replace('public/','',$file);
            $data['image'] = $file;
        }

        $post->update($data);

        return redirect()->route('posts.index');
    }

    public function search(Request $request){

        $filters = $request->except('_token');

        $posts = Post::where('title', 'LIKE' ,"%{$request->search}%")
        ->orWhere('content', 'LIKE' ,"%{$request->search}%")
        ->paginate();
    return view('admin.posts.index', compact('posts','filters'));
    }
}
