<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PageController extends Controller
{
        /**
     * Display a listing of the posts.
     *
     */
    public function index()
    {
        $posts = Post::when($search = request('search'), function ($query) use ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('body', 'LIKE', '%' . $search . '%')
                ->orWhereHas('author', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->orWhereHas('categories', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
        })
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('welcome', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $categories = $post->categories->pluck('name'); 
        return view('post-details', compact('post', 'categories'));
    }
    
}
