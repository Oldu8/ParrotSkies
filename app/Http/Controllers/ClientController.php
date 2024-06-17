<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\View\View;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index(): View
    {
        return view('client.home');
    }

    public function showAllPosts(Request $request): View
    {
        $category = $request->input('category');
        if ($category) {
            $posts = Post::where('category_id', $category)->paginate(10);
        } else {
            $posts = Post::paginate(10);
        }
        $categories = Category::pluck('name', 'id');
        return view('client.posts.index', compact('posts', 'categories'));
    }

    public function showPostBySlug($slug): View
    {
        // Fetch the post by slug
        $post = Post::where('slug', $slug)->firstOrFail();

        // Return the view with the post
        return view('client.posts.show', compact('post'));
    }
    public function showAllCategories(): View
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('client.categories.index', compact('categories'));
    }
}
