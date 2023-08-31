<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::resource('products', ProductController::class);


Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/registration',[AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

// posts routes

Route::get('/posts',[PostsController::class,'getAllPosts'])->name('post.getallpost');

Route::get('/add-post',[PostsController::class,'addPost'])->name('post.add');

Route::post('/add-post',[PostsController::class,'addPostSubmit'])->name('post.addsubmit');

Route::get('/posts/{id}',[PostsController::class,'getPostById'])->name('post.getbyid');

Route::get('/delete-post/{id}',[PostsController::class,'deletePost'])->name('post.delete');

Route::get('/edit-post/{id}',[PostsController::class,'editPost'])->name('post.edit');

Route::post('/update-post',[PostsController::class,'updatePost'])->name('post.update');

// employee modal routes

Route::resource('employee',EmployeeController::class);
