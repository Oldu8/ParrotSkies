<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\Posts\SaveRequest;
use App\Http\Requests\Posts\PostStatusRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.posts.create', compact('categories'));
    }

    public function store(SaveRequest $request)
    {
        $post = Post::create($request->validated());
        return redirect('admin/posts/')->with('success', 'Post created!');
    }

    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.posts.show', compact('post', 'categories'));
    }

    // public function edit(string $id)
    // {
    //     $post = Post::findOrFail($id);
    //     // return view('posts.edit', ['post' => $post]); // same as below
    //     return view('posts.edit', compact('post'));
    // }

    // public function update(SaveRequest $request, string $id)
    // {
    //     $post = Post::findOrFail($id);
    //     $post->update($request->validated());
    //     return redirect()->route('posts.show', $post->id)->with('success', 'Updated Successfully!');
    // }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/admin/posts')->with('success', 'Post deleted successfully');
    }
    public function toggleActive(PostStatusRequest $request, string $id)
    {
        $data = $request->validated();
        // dd($data);
        $post = Post::findOrFail($id);
        $post->update(['active' => $data['active'] === 'true']);
        return redirect()->back();
    }
}
