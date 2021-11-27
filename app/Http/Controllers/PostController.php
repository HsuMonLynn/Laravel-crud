<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(8);
        return view('posts.index',compact('posts'));    
    }
    public function create()
    {
       return view('posts.create');
    }
    public function store(PostStoreRequest $request)
    {
        $post = Post::create(
            [
                'title' => $request->title, 
                'body' => $request->body,
                'user_id' => $request->user_id           
            ]); 
     
        return redirect()->route('posts.index')
                        ->with('success','Posts created successfully.');
    }
    public function show($id)
    {   
        $post = Post::findOrFail($id);
        return view('posts.edit',compact('post'));
    }
    public function update(PostUpdateRequest $request,$id){
        
        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title, 
            'body' => $request->body,
            'user_id' => $request->user_id 
        ]);

        return redirect()->route('posts.index')
                        ->with('success','Post updated suceessfully.');

    }

    
}
