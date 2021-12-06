<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\UserSearchRequest;
use App\Http\Requests\PostUpdateRequest;

class PostController extends Controller
{   /**
    * Display a listing of the posts.
    *
    */
    public function index()
    {   
        
        $posts = Post::orderBy('created_at','desc')->paginate(5);

        return view('posts.index',compact('posts'));    
    }
    
    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('posts.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        $post = Post::create([
                'title' => $request->title, 
                'body' => $request->body,
                'user_id' => $request->user_id,           
            ]); 
     
        return redirect()
                ->route('posts.index')
                ->with('success','Posts created successfully.');
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

        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request,$id){
        
        $post = Post::findOrFail($id);
        $post->update([

            'title' => $request->title, 
            'body' => $request->body,
            'user_id' => $request->user_id 
        ]);

        return redirect()
                ->route('posts.index')
                ->with('success','Post updated suceessfully.');

    }

    /**
     * Remove the specified post from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $post = Post::find($id);
        $post->delete();

        return redirect()
                ->route('posts.index')
                ->with('success','Post Deleted successfully.');
    }

    public function search(UserSearchRequest $request){
        $search = $request->search;
        $posts = Post::where('title', 'LIKE', '%' . $search . '%' )
                ->orWhere('body', 'LIKE', '%' . $search . '%' )
                ->orWhere('id', 'LIKE', '%' . $search . '%' )
                ->orWhereHas('author', function ($query) use ($search) {
                    $query->where('name', 'like', '%'.$search.'%');
                })
                ->orderBy('created_at','desc')->paginate(5);

        return view('posts.index',compact('posts'));
    }

    
}
