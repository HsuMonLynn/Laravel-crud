@extends('adminlte.master')
@section('content')
    <div class="card mt-3 col-md-6 offset-md-3">
        <div class="card-body">
            <h2 class="row justify-content-center">Add New User</h2>
            <div class="p-2">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    @include('users._form',['submitBtn'=>'Create'])                         
                </form>
            </div>
        </div>
    </div>

@endsection
