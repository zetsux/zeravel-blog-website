<?php

namespace App\Http\Controllers;
use \Cviebrock\EloquentSluggable\Services\SlugService;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('admin');
        return view('dashboard.categories.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => "required|max:30|unique:categories",
            'slug' => "required|unique:categories",
        ]);

        Category::create($validatedData);
        return redirect('/dashboard/categories')->with('success', "You've successfully added a category named '" . $validatedData['name'] . "'!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $this->authorize('admin');
        return view('dashboard.categories.edit', [
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'name' => "required|max:30|unique:categories",
            'slug' => ($request->slug !== $category->slug ? "required|unique:categories" : "required")
        ]);

        Category::where('id', $category->id)->update($validatedData);
        return redirect('/dashboard/categories')->with('success', "You've successfully edited a category named '" . $category->name . "'!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $categoryName = $category->name;
        category::destroy($category->id);
        
        return redirect('/dashboard/categories')->with('success', "You've successfully deleted a category named '" . $categoryName . "'!");
    }

    public function getSlug(Request $request)
    {
        $slug = "";
        if(!empty($request->name)) {
            $slug = SlugService::createSlug(Category::class, 'slug', $request->name);
        }

        return response()->json(['slug' => $slug]);
    }
}
