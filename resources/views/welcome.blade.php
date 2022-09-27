@extends('layouts.app')
@section('content')
<div class="container">
    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
        <div class="section mb-5">
            <div class="row mt-3">
                <div class="col-md-12">

                    <h3 class="text-center">
                        <i class="fa fa-star fa-xs" style="color: #F28602"></i>
                        <i class="fa fa-star fa-xs" style="color: #F28602"></i>
                        Posts List
                        <i class="fa fa-star fa-xs" style="color: #F28602"></i>
                        <i class="fa fa-star fa-xs" style="color: #F28602"></i>
                    </h3>
                    <div class="row">
                        <div class="col-md-6 offset-md-6">
                            <div class="input-group mb-3 justify-content-end">
                                <form class="form-inline" action="{{ route('welcome') }}"
                                    method="GET">
                                    <input class="form-control" type="search" name="search"
                                        value="{{ request('search') }}" />
                                    <button type="submit" class="btn btn-outline-primary">Search</button>
                                </form>   
                            </div>
                        </div>
                    </div>
                    @forelse($posts as $post)
                        <div class="card py-3 my-3" style="background-color: #EAEAF1">
                            <div class="row px-3">
                                <div class="col-md-3">
                                        <h5 class="font-weight-bold" style="color: #3490DC">{{ $post->title }}</h5>
                                </div>
                                <div class="col-md-5">
                                    <h5 class="font-weight-bold">{{ Str::limit($post->body, 100) }} <a
                                            href="{{ route('post-details',$post->id) }}">Details</a>
                                    </h5>
                                </div>
                                <div class="col-md-2">
                                    <h5 class="font-weight-bold">@foreach($post->categories as
                                        $category){{ $category->name }}<br>@endforeach</h5>
                                </div>
                                <div class="col-md-2">
                                    <h5 class="font-weight-bold">{{ $post->author->name }}</h5>
                                </div>
                                <div class="col-md-2">
                                    <h5 class="font-weight-bold">{{ $post->author->name }}</h5>
                                </div>
                                <div class="col-md-2">
                                    <h5 class="font-weight-bold">{{ $post->author->name }}</h5>
                                </div>
                                <div class="col-md-2">
                                    <h5 class="font-weight-bold">Nothing</h5>
                                </div>
                                <div class="col-md-2">
                                    <h5 class="font-weight-bold">Nothing</h5>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="card" style="background-color: #EAEAF1">
                            <div class="row p-3">
                                <div class="row justify-content-center">
                                    <h5>No post Found.</h5>
                                </div>
                            </div>
                        </div>
                    @endforelse
                    <div class="row justify-content-start">
                        {!! $posts->links() !!}
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
</div>
@endsection
