@extends('adminlte.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="row justify-content-center ml-3">
                <h2>Laravel 8 CRUD</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a class="btn btn-success " href="{{ route('users.create') }}"> Create New User</a>
                </div>
                <div class="col-md-4 ml-auto pl-5">
                    <div class="input-group mb-3 justify-content-end">
                        <form class="form-inline row ml-3" action="{{ route('users.index') }}" method="GET">
                            <input class="form-control mr-sm-2" type="search" name="search"
                                value="{{ request('search') }}" />
                            <button type="submit" class="btn btn-outline-primary my-2 my-sm-0">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success row">
            <p style="margin: 0" class="col-md-11">{{ $message }}</p>
            <button type="button" class="close col-md-1" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true" class="row justify-content-end">×</span>
            </button>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th width="180px">Action</th>
        </tr>
        @forelse($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        <a class="btn btn-outline-info mr-3" href="{{ route('users.edit', $user->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger"
                            onclick="return confirm('Are you sure want to delete?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">
                    <h4 class="text-info row justify-content-center">No users found.</h4>
                </td>
            </tr>
        @endforelse
    </table>
    {!! $users->links() !!}
@endsection
