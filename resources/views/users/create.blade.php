@extends('users.layout')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Post</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
        </div>
    </div>
</div>

{{-- @if ($errors->any())
    
    @foreach ($errors->all() as $error)
                
    @endforeach
      
@endif --}}
<form action="{{ route('users.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control @error('name')
                is-invalid @enderror" placeholder="Name">
                @if($errors->has('name'))
                <span class="error text-danger text-bold">{{ $errors->first('name') }}</span>
                @endif
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Email:</strong>
              <input type="email" name="email" class="form-control @error('email')
              is-invalid @enderror" placeholder="Email">
            </div>
            @if($errors->has('email'))
                <span class="error text-danger text-bold">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection