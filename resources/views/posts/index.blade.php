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
                        <form class="form-inline row ml-3" action="{{ route('posts.index') }}" method="GET">
                            <input class="form-control mr-sm-2" type="search" name="search"
                                value="{{ request('search') }}" />
                            <button type="submit" class="btn btn-outline-primary my-2 my-sm-0">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
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
            <th width="450px">Body</th>
            <th>Author</th>
            <th width="120px">Date</th>
            <th width="160px">Action</th>
        </tr>
        @forelse($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->author->name ?? 'None' }}</td>
                <td>{{ $post->created_at->format('d-m-Y') }}</td>
                <td>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        <a class="btn btn-outline-info mr-2" href="{{ route('posts.edit', $post->id) }}">Edit</a>
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
