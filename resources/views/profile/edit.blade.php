@extends('adminlte.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h4>My Profile</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update', $user->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" id=""
                                class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">
                            @error('name')
                                <span class="text-danger text-bold">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" name="email" id=""
                                class="form-control @error('email') is-invalid @enderror" readonly
                                value="{{ $user->email }}">
                            @error('email')
                                <span class="text-danger text-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            @if($user->profile->image)
                                <img src="{{ asset('storage/user-photos/'.$user->profile->image) }}"
                                    alt="" width="100" height="100" class="mb-3 ml-3" id="preview-img">
                            @else
                                <img src="{{ asset('images/user.png') }}" alt="" width="100"
                                    height="100" class="mb-3 ml-3" id="preview-img">
                            @endif
                            <input type="file" name="photo" id="profile"
                                class="form-control-file @error('photo') is-invalid @enderror">
                            @error('photo')
                                <span class="text-danger text-bold">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row col-12 pt-3 pb-3">
                            <div class="col-md-4">
                                <a class="btn btn-secondary" href="{{ route('users.index') }}">
                                    Back</a>
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
    </div>
</div>
@endsection
