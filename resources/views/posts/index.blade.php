@extends('users.layout')
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="row justify-content-center">
                <h2>Laravel 8 CRUD</h2>
            </div>
            <div class="row justify-content-start">
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <form class="row ml-3" action="{{ route('posts.search') }}" method="GET">
                            <input type="text" name="search"/>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 ml-auto">
                    <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
                </div>
            </div>    
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th width="450px">Body</th>
            <th>Author</th>
            <th width="120px">Date</th>
            <th width="160px">Action</th>
        </tr>
        @if($posts->isNotEmpty())
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->body }}</td>
            <td>{{ $post->author->name }}</td>
            <td>{{ $post->created_at->format('d-m-Y')}}</td>
            <td>
                <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                    <a class="btn btn-primary" href="{{route('posts.update',$post->id)}}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <div>
            <h2>No posts found</h2>
        </div>
        @endif
    </table> 
    {{-- {!! $posts->links('pagination::bootstrap-4') !!}       --}}
@endsection