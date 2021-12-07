@extends('adminlte.master')

@section('content')

<div class="card mt-3 col-md-6 offset-md-3">
    <div class="card-body">
        <h2 class="row justify-content-center">Edit user</h2>
        <div class="p-2">
            <form action="{{ route('users.update',$user->id) }}" method="POST">
                @csrf
                @method('PUT')

                    @include('users.form')
                    <div class="row col-12 pt-3 pb-3">
                        <div class="col-md-4">
                            <a class="btn btn-secondary" href="{{ route('users.index') }}"> Back</a>
                        </div>
                        <div class="col-md-4 ml-auto">
                            <div class="row justify-content-end">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                
            </form>
        </div>
    </div>
</div>
@endsection
