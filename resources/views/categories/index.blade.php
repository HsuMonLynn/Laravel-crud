@extends('adminlte.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="row justify-content-center ml-3">
                <h2>Laravel 8 CRUD</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a class="btn btn-success " href="{{ route('categories.create') }}"> Create New Category</a>
                </div>
                <div class="col-md-4 ml-auto pl-5">
                    <div class="input-group mb-3 justify-content-end">
                        <form class="form-inline row ml-3" action="{{route('categories.index')}}" method="GET">
                            <input class="form-control mr-sm-2" type="search" name="search"
                                value="{{request('search')}}" />
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
            <th width="10%">No</th>
            <th width="75%">Name</th>
            <th width="15%">Action</th>
        </tr>
        @forelse($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                        <a class="btn btn-outline-info mr-3" href="{{ route('categories.edit',$category->id) }}">Edit</a>
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
                    <h4 class="text-info row justify-content-center">No categories found.</h4>
                </td>
            </tr>
        @endforelse
    </table>
    {!! $categories->links() !!}
@endsection
