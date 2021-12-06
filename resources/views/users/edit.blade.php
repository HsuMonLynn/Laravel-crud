@extends('adminlte.master')

@section('content')

<div class="card mt-3 col-md-6 offset-md-3">
    <div class="card-body">
        <h2 class="row justify-content-center">Edit user</h2>
        <div class="p-2">
            <form action="{{ route('users.update',$user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control @error('name')
                            is-invalid @enderror" placeholder="Name">
                            @if($errors->has('name'))
                                <span
                                    class="error text-danger text-bold">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control @error('email')
                            is-invalid @enderror" placeholder="Email">
                            @if($errors->has('email'))
                                <span
                                    class="error text-danger text-bold">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row col-md-6 offset-md-3 pt-3 pb-3">
                        <div class="col-md-6">
                            <a class="btn btn-info" href="{{ route('users.index') }}"> Back</a>
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
