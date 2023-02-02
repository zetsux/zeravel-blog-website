<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    public function showPosts() {
        $title = '';

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = $category->name;
        }

        if (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $title = $user->name . "'s";
        }

        return view('blog', [
            "title" => $title,
            "posts" => Post::latest()->filter(request(['search', 'category', 'user']))->paginate(7)->withQueryString(),
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
