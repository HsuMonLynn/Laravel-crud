@extends('adminlte.master')

@section('content')

<div class="card mt-3 col-md-6 offset-md-3">
    <div class="card-body">
        <h2 class="row justify-content-center">Edit Post</h2>
        <div class="p-2">
            <form action="{{ route('posts.update',$post->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Title:</strong>
                            <input type="text" name="title" value="{{ $post->title }}" class="form-control @error('title')
                            is-invalid @enderror" placeholder="Title">
                            @if($errors->has('title'))
                                <span
                                    class="error text-danger text-bold">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Body:</strong>
                            <textarea class="form-control @error('body') 
                            is-invalid @enderror" name="body" value="" id="" rows="4" placeholder="Body">{{ $post->body }}</textarea>
                        </div>
                        @if($errors->has('body'))
                            <span
                                class="error text-danger text-bold">{{ $errors->first('body') }}</span>
                        @endif
                    </div>
                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Body:</strong>
                            <input type="textarea" rows="10" name="body" value="{{ $post->body }}" class="form-control @error('body')
                          is-invalid @enderror" placeholder="Body" />
                        </div>
                        @if($errors->has('body'))
                            <span
                                class="error text-danger text-bold">{{ $errors->first('body') }}</span>
                        @endif
                    </div> --}}
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Author</strong>
                            <select name="user_id" class="form-control @error('user_id')
                            is-invalid @enderror">
                            <option value="">Select Author</option>
                            @foreach ($authors as $author)
                            <option value="{{$author->name}}">{{$author->name}}</option>
                            @endforeach
                        </select>
                            @if($errors->has('user_id'))
                                <span
                                    class="error text-danger text-bold">{{ $errors }}</span>
                            @endif
                        </div>
                    </div>
                    {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Author ID</strong>
                            <input type="text" name="user_id" value="{{ $post->user_id }}" class="form-control @error('user_id')
                            is-invalid @enderror" placeholder="Author ID">
                            @if($errors->has('user_id'))
                                <span
                                    class="error text-danger text-bold">{{ $errors->first('user_id') }}</span>
                            @endif
                        </div>
                    </div> --}}
                    <div class="row col-md-6 offset-md-3 pt-3 pb-3">
                        <div class="col-md-6">
                            <a class="btn btn-info" href="{{ route('posts.index') }}"> Back</a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
