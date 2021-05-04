@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center">
            <h1> {{ Auth::user()->name }}'s Post</h1>
        </div>
        @foreach($myPosts as $post)

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

                    <div class="row justify-content-around">
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

                </div>
            </div>

        @endforeach

    </div>
@endsection
