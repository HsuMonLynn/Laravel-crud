<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Http\Requests\PostStoreRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->paginate(8);
        return view('posts.index',compact('posts'));    
    }
    
}
