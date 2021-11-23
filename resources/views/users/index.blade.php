@extends('users.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="row justify-content-center ml-3">
                <h2>Laravel 8 CRUD</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <form class="row ml-3" action="{{ route('users.search') }}" method="GET">
                            <input type="text" name="search"/>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-4 ml-auto">
                    <a class="btn btn-success " href="{{ route('users.create') }}"> Create New User</a>
                </div>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif  
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th width="280px">Action</th>
        </tr>
        @if($users->isNotEmpty())
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                    <a class="btn btn-primary" href="{{route('users.update',$user->id)}}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <div>
            <h2>No users found</h2>
        </div>
        @endif
    </table>
    {!! $users->links('pagination::bootstrap-4') !!}
    @endsection