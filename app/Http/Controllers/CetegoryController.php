<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;

class CetegoryController extends Controller
{

    public function  index(){
        $categories = Category::all();
        return view('post.category',[
            'categories' => $categories
        ]);
    }

    public function store(Request $request){
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return redirect(route('category'));
    }

    public function delete($id){
        Category::find($id)->delete();
        return redirect(route('category'));
    }

    public function edit(Request $request,$id){
        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect(route('category'));
    }

}
