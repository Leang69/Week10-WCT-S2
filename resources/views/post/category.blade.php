@extends('layouts.app')

@section('content')
    <div class="container">

        <table class="table">
            <thead class="thead-dark">
            <tr class="text-center">
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr class="text-center">
                    <td>{{$category->name}}</td>
                    <td class="row justify-content-around">

                        <div class="dropdown show">
                            <button class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Edit
                            </button>

                            <div class="dropdown-menu p-2" aria-labelledby="dropdownMenuLink">
                                <form  action="{{route('category.edit',$category->id) }}" method="POST">
                                    @csrf
                                    <input name="name" class="form-control required " type="text" placeholder="Category Name"
                                           required>
                                    <button type="submit" class="btn btn-primary my-1">Done</button>
                                </form>
                            </div>
                        </div>

                        <form  action="{{route('category.delete', $category->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


        <form action="{{ route('category.store') }}" method="POST">
            @csrf
            <input name="name" class="form-control form-control-lg required " type="text" placeholder="Category Name"
                   required>
            <button type="submit" class="btn btn-success my-2">Create new post category</button>
        </form>

    </div>


@endsection
