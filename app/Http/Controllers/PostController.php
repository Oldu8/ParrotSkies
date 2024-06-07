<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\Posts\PostSaveRequest;
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

    public function store(PostSaveRequest $request)
    {
        $post = Post::create($request->validated());
        return redirect('admin/posts/')->with('success', 'Post created!');
    }

    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(PostSaveRequest $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->validated());
        return redirect()->route('posts.index', $post->id)->with('success', 'Updated Successfully!');
    }

    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/admin/posts')->with('success', 'Post deleted successfully');
    }
    public function toggleActive(PostStatusRequest $request, string $id)
    {
        $data = $request->validated();
        $post = Post::findOrFail($id);
        $post->update(['active' => $data['active'] === 'true']);
        return response()->json(['status' => 'success', 'active' => $post->active]);
    }
}
