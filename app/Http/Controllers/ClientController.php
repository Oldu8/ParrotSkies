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

    public function showAllPosts(): View
    {
        $posts = Post::all();
        $categories = Category::all()->pluck('name', 'id');
        return view('client.posts.index', compact('posts', 'categories'));
    }

    public function showAllCategories(): View
    {
        $categories = Category::all()->pluck('name', 'id');
        return view('client.categories.index', compact('categories'));
    }
}
