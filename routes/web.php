<?php

// Right Click -> Import All Classes (from PHP Namespace Resolver extension)

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;

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
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/blog', [PostController::class, 'showAll']);

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Zetsu",
        "email" => "zeravel@gmail.com",
        "image" => "pict.jpeg"
    ]);
});

Route::get('/blog/{post:slug}', [PostController::class, 'showOne']);

Route::get('/categories', [CategoryController::class, 'showCategories']);

Route::get('/categories/{category:slug}', [CategoryController::class, 'showPosts']);

Route::get('/users', [UserController::class, 'showUsers']);

Route::get('/users/{author:username}', [UserController::class, 'showPosts']);