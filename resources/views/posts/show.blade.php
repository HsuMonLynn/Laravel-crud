@extends('adminlte.master')

@section('content')
<div class="card">
    <div class="card-body">
      <div class="row justify-content-center py-3">
          <h1 class="card-title center">{{$post->title}}</h1>
        </div>
      <div class="row">
      <p class="card-text">{{$post->body}}</p>
      </div>
      
      <div class="row justify-content-end py-3">
          
      <p class="card-text">Created by  <small class="text-muted">{{$post->author->name}}</small></p>
      
      </div>
    </div>
    <div class="row col-12 pt-3 pb-3">
    <div class="col-md-12">
            <a class="btn btn-secondary" href="{{ route('posts.index') }}"> Back</a>
        </div>
</div>
  </div>

@endsection