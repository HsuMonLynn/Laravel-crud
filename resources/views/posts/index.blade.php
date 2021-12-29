@extends('adminlte.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="row justify-content-center">
            <h2>Laravel 8 CRUD</h2>
        </div>
        <div class="row justify-content-start">
            <div class="col-md-4">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
            </div>
            <div class="col-md-4 ml-auto pl-5">
                <div class="input-group mb-3 justify-content-end">
                    <form class="form-inline row ml-3" action="{{ route('posts.index') }}"
                        method="GET">
                        <input class="form-control mr-sm-2" type="search" name="search"
                            value="{{ request('search') }}" />
                        <button type="submit" class="btn btn-outline-primary my-2 my-sm-0">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-12">
            <form action="{{route('posts.import')}}" method="POST" enctype="multipart/form-data">
            @csrf  
            <div class="form-group">
               <div class="row">
               <div class="col-10">
                     <input type="file" name="post_file" class="form-control" style="padding:0px">
                </div>
                <div class="col-2">
                    <button class="btn btn-success">Import</button>
                    <a class="btn btn-info ml-4" href="{{route('posts.export')}}">Export</a>
                </div>
               </div>
                
            </div> 
                
                </form>
            </div>

        </div>
    </div>
</div>

@if($message = Session::get('success'))
    <div class="alert alert-success row">
        <p style="margin: 0" class="col-md-11">{{ $message }}</p>
        <button type="button" class="close col-md-1" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="row justify-content-end">×</span>
        </button>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th width="300px">Body</th>
        <th>Category</th>
        <th>Date</th>
        <th width="160px">Action</th>
    </tr>
    @forelse($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ Str::limit($post->body, 100) }} <a
                    href="{{ route('posts.show',$post->id) }}">Details</a></td>
            <td>@foreach($post->categories as $category){{ $category->name }}<br>@endforeach</td>
            <td>{{ $post->created_at->format('d-m-Y') }}</td>
            <td>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    <a class="btn btn-outline-info mr-2" 
                        href="{{ route('posts.edit', $post->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger"
                        onclick="return confirm('Are you sure want to delete?')">Delete</button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6">
                <h4 class="text-info row justify-content-center">No posts found.</h4>
            </td>
        </tr>
    @endforelse
</table>
{!! $posts->links() !!}
@endsection
