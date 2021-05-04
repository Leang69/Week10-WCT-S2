@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1>Posts </h1>
            @auth
                <a type="button" class="btn btn-primary" href="{{ route('posts.create') }}">Crate Post</a>
            @endauth
        </div>

        @foreach($posts as $post)
            <div class="card mx-auto my-4" style="width: 18rem;">
                <div class="card-header">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    @empty(!$post->category)
                        <h6 class="card-title">Cetegory: {{ $post->category->name }}</h6>
                    @endempty
                    <h6 class="card-title">{{ $post->user->name }}</h6>
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $post->body }}</p>
                </div>
                @cannot('editor')
                    <div class="card-footer d-flex justify-content-around">
                        <form action="{{ route('post.edit',$post->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success">Edit</button>
                        </form>
                        <form action="{{ route('post.delete',$post->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                @endcannot
            </div>


        @endforeach

        <div class="row">
            <div class="col-12 my-auto" >
                {{ $posts->links("pagination::bootstrap-4") }}
            </div>
        </div>
    </div>
    <style>
        .pagination{
            display: flex;
            justify-content: center;
        }
    </style>
@endsection
