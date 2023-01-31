<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function showAll() {
        return view('blog', [
            "title" => "Blog",
            "posts" => Post::getAllPosts()
        ]);
    }

    public function showOne($slug) {
        return view('post', [
            "title" => "Post",
            "post" => Post::getPostBySlug($slug)
        ]);
    }
}
