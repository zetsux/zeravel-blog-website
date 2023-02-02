<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function showPosts(Category $category) {
        return view('blog', [
            'title' => $category->name,
            'posts' => $category->posts->load('category', 'user'),
            'category' => $category->name,
            'type' => "Category"
        ]);
    }

    public function showCategories() {
        return view('categories', [
            'title' => 'Post Categories',
            'categories' => Category::latest()->get()
        ]);
    }
}
