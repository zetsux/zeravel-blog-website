<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function showPosts(Category $category) {
        return view('category', [
            'title' => $category->name,
            'posts' => $category->posts,
            'category' => $category->name
        ]);
    }

    public function showCategories() {
        return view('categories', [
            'title' => 'Post Categories',
            'categories' => Category::latest()->get()
        ]);
    }
}
