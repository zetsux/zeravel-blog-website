<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function showPosts(User $author) {
        return view('blog', [
            'title' => $author->name . "'s",
            'posts' => $author->posts,
            'author' => $author->name,
            'type' => "User"
        ]);
    }

    public function showUsers() {
        return view('attribute', [
            'title' => 'Users',
            'attributes' => User::latest()->get(),
            'type' => 'user'
        ]);
    }
}
