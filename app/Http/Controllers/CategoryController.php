<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function showCategories() {
        return view('attribute', [
            'title' => 'Categories',
            'attributes' => Category::latest()->paginate(6)->withQueryString(),
            'type' => "category"
        ]);
    }
}
