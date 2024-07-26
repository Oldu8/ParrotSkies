<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\Posts\PostSaveRequest;
use App\Http\Requests\Posts\PostStatusRequest;
use Mews\Purifier\Facades\Purifier;

class PostController extends Controller
{
    public function index(Request $request)
    {
        // Get sorting parameters from the request
        $sort = $request->get('sort', 'id');
        $order = $request->get('order', 'asc');

        // Validate the sorting columns
        $validSorts = ['id', 'title', 'category_id', 'slug', 'active', 'published_at'];
        if (!in_array($sort, $validSorts)) {
            $sort = 'id';
        }

        $posts = Post::orderBy($sort, $order)->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('admin.posts.create', compact('categories'));
    }

    public function store(PostSaveRequest $request)
    {
        $validated = $request->validated();
        $validated['content'] = Purifier::clean($validated['content']);

        // Handle the published_at date format
        if (!empty($validated['published_at'])) {
            $validated['published_at'] = date('Y-m-d H:i:s', strtotime($validated['published_at']));
        }

        // Create the post
        $post = Post::create($validated);

        // Handle the thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $post->update(['thumbnail' => $thumbnailPath]);
        }

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
        $validated = $request->validated();
        $validated['content'] = Purifier::clean($validated['content']);

        // Handle the published_at date format
        if (!empty($validated['published_at'])) {
            $validated['published_at'] = date('Y-m-d H:i:s', strtotime($validated['published_at']));
        }

        // Handle the thumbnail upload
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $validated['thumbnail'] = $thumbnailPath;
        }

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', 'Updated Successfully!');
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
