@extends('users.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit user</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   --}}
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
                    <span class="error text-danger text-bold">{{ $errors->first('title') }}</span>
                    @endif
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Body:</strong>
                  <input type="textarea" rows="10" name="body" value="{{ $post->body }}" class="form-control @error('body')
                  is-invalid @enderror" placeholder="Body"/>
                </div>
                @if($errors->has('body'))
                    <span class="error text-danger text-bold">{{ $errors->first('body') }}</span>
                @endif
            </div>
    
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Author ID</strong>
                    <input type="text" name="user_id" value="{{ $post->user_id }}" class="form-control @error('user_id')
                    is-invalid @enderror" placeholder="Author ID">
                    @if($errors->has('user_id'))
                    <span class="error text-danger text-bold">{{ $errors->first('user_id') }}</span>
                    @endif
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
@endsection