<?php

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});


Auth::routes();

Route::get('/myPost', [App\Http\Controllers\PostController::class, 'myPost'])->name('myPost');
Route::get('/posts', [App\Http\Controllers\PostController::class, 'posts'])->name('posts');
Route::get('/posts_create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::post('/posts_store', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::post('/posts_delete/{id}', [App\Http\Controllers\PostController::class, 'delete'])->name('post.delete');
Route::post('/posts_edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::post('/posts_update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');

Route::get('/category', [App\Http\Controllers\CetegoryController::class, 'index'])->name('category');
Route::post('/category_store', [App\Http\Controllers\CetegoryController::class, 'store'])->name('category.store');
Route::post('/category_delete/{id}', [App\Http\Controllers\CetegoryController::class, 'delete'])->name('category.delete');
Route::post('/category_edit/{id}', [App\Http\Controllers\CetegoryController::class, 'edit'])->name('category.edit');
