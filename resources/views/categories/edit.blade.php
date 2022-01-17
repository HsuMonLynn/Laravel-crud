@extends('adminlte.master')

@section('content')

<div class="card mt-3 col-md-6 offset-md-3">
    <div class="card-body">
        <h2 class="row justify-content-center">Edit Category</h2>
        <div class="p-2">
            <form action="{{ route('categories.update',$category->id) }}" method="POST">
                @csrf
                @method('PUT')
                    @include('categories._form',['submitBtn'=>'Update'])
            </form>
        </div>
    </div>
</div>
@endsection
