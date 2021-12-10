@extends('adminlte.master')
@section('content')
<div class="card mt-3 col-md-6 offset-md-3">
    <div class="card-body">
        <h2 class="row justify-content-center">Add New Post</h2>
        <div class="p-2">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                @include('posts._form',['submitBtn'=>'Create'])
            </form>
        </div>
    </div>
</div>
@endsection
