<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{/**
 * Display a listing of the posts.
 *
 */
    public function index()
    {
        $posts = Post::when($search = request('search'), function ($query) use ($search) {
            $query->where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('body', 'LIKE', '%' . $search . '%')
                ->orWhere('id', 'LIKE', '%' . $search . '%')
                ->orWhereHas('author', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
        })
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $authors = User::all();
        return view('posts.create',compact('authors'));
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user_id,
        ]);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Posts created successfully.');
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $authors = User::all();
        return view('posts.edit', compact('post','authors'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update([

            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user_id,
        ]);

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post updated suceessfully.');

    }

    /**
     * Remove the specified post from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post Deleted successfully.');
    }

}
