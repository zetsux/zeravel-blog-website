<?php

namespace App\Http\Controllers;
use \Cviebrock\EloquentSluggable\Services\SlugService;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
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
            'title' => "required|max:255",
            'slug' => "required|unique:posts",
            'image' => "image|file|max:2048",
            'category_id' => "required",
            'content' => "required"
        ]);

        if($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->content), 150);

        Post::create($validatedData);
        return redirect('/dashboard/posts')->with('success', "You've successfully added a post titled '" . $validatedData['title'] . "'!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if ($post->user->id !== auth()->user()->id) abort(403);
        return view('dashboard.posts.detail', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if ($post->user->id !== auth()->user()->id) abort(403);
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => "required|max:255",
            'category_id' => "required",
            'image' => "image|file|max:2048",
            'slug' => ($request->slug !== $post->slug ? "required|unique:posts" : "required"),
            'content' => "required"
        ];

        $validatedData = $request->validate($rules);

        if($request->file('image')) {
            if($request->oldImg) Storage::delete($request->oldImg);
            $validatedData['image'] = $request->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->content), 150);

        Post::where('id', $post->id)->update($validatedData);
        return redirect('/dashboard/posts')->with('success', "You've successfully edited a post titled '" . $post->title . "'!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $postTitle = $post->title;

        if($post->image) Storage::delete($post->image);
        Post::destroy($post->id);
        
        return redirect('/dashboard/posts')->with('success', "You've successfully deleted a post titled '" . $postTitle . "'!");
    }

    public function getSlug(Request $request)
    {
        $slug = "";
        if(!empty($request->title)) {
            $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        }

        return response()->json(['slug' => $slug]);
    }
}
