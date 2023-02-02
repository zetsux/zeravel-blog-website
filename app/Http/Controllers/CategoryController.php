<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function showPosts(Category $category) {
        return view('blog', [
            'title' => $category->name,
            'posts' => $category->posts,
            'category' => $category->name,
            'type' => "category"
        ]);
    }

    public function showCategories() {
        return view('attribute', [
            'title' => 'Categories',
            'attributes' => Category::latest()->get(),
            'type' => "category"
        ]);
    }
}
