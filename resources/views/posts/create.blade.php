@extends('adminlte.master')
@section('content')
<div class="card mt-3 col-md-6 offset-md-3">
    <div class="card-body">
        <h2 class="row justify-content-center">Add New Post</h2>
        <div class="p-2">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                @include('posts.form')
                    <div class="row col-12 pt-3 pb-3">
                        <div class="col-md-4">
                            <a class="btn btn-secondary" href="{{ route('posts.index') }}"> Back</a>
                        </div>
                        <div class="col-md-4 ml-auto">
                            <div class="row justify-content-end">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
