<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function myPost()
    {
        $post = Post::where('user_id',Auth::id())->get();
        return view('post.myPost',[
            'myPosts' => $post
        ]);
    }

    public function posts()
    {
        $posts = Post::paginate(10);
        return view('post.posts',[
            'posts' => $posts
        ]);
    }

    public function create(){
        $categories = Category::all();
        return view('post.createPost',[
            'categories' => $categories
        ]);
    }

    public function store(Request $request){

        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::id();
        $post->save();
        return redirect(route('posts'));

    }

    public function delete($id){
        Post::find($id)->delete();
        $post = Post::where('user_id',Auth::id())->get();
        return redirect(route('myPost'));
    }

    public function edit($id){
        $post = Post::find($id);
        $categories = Category::all();
        return view('post.editPost',[
            'editPost' => $post,'categories' => $categories
        ]);
    }

    public function update(Request $request,$id){
        $post = Post::find($id);
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->body = $request->body;
        $post->save();
        return redirect(route('myPost'));
    }

}
