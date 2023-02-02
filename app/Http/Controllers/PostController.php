<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function showPosts() {
        return view('blog', [
            "title" => "All",
            "posts" => Post::latest()->filter(request(['search', 'category', 'user']))->get(),
            'type' => "All"
        ]);
    }

    public function showOne(Post $post) {
        return view('post', [
            "title" => "Post",
            "post" => $post
        ]);
    }
}
