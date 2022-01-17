@extends('adminlte.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb mb-5">
        <div class="row justify-content-center">
            <h2>User Profile</h2>
        </div>
    </div>
</div>

@if($message = Session::get('success'))
    <div class="alert alert-success row">
        <p style="margin: 0" class="col-md-11">{{ $message }}</p>
        <button type="button" class="close col-md-1" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="row justify-content-end">×</span>
        </button>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <div class="row justify-content-start">
            <div class="row py-3">
                <div class="col">
                    <div class="">
                        @if($user->profile->image)
                            <img src="{{ asset('storage/user-photos/'.$user->profile->image) }}" alt=""
                                width="100" height="100" class="mb-2 ml-3" id="preview-img">
                        @else
                            <img src="{{ asset('images/user.png') }}" alt="" width="100"
                                height="100" class="mb-2 ml-3" id="preview-img">
                        @endif
                    </div>
                </div>
                <div class="col py-2 px-5">
                    <div class="row">
                        <div class="col-6">
                            <label for="">Name :</label>
                        </div>
                        <div class="col-6">
                            <h1 class="card-title mb-5">{{ $user->name }}</h1>
                        </div>   
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="">Email :</label>
                        </div>
                        <div class="col-6">
                            <h1 class="card-title">{{ $user->email }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row col-12 pt-3 pb-3">
        <div class="col-md-4">
            <a class="btn btn-secondary" href="{{ route('users.index') }}"> Back</a>
        </div>
        <div class="col-md-4 ml-auto">
            <div class="row justify-content-end">
                <a class="btn btn-primary"
                    href="{{ route('profile.edit',$user->id) }}"> Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
