<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Categories\CategoriesSaveRequest;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('posts')->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(CategoriesSaveRequest $request)
    {
        $category = Category::create($request->validated());
        return redirect('admin/categories/')->with('success', 'Category created!');
    }

    //  add list of posts for this category in show method

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $posts = $category->posts;
        // dd($posts);
        // $categories = Category::all()->pluck('name', 'id');
        return view('admin.categories.edit', compact('category', 'posts'));
    }


    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/admin/categories')->with('success', 'Category deleted successfully');
    }
}
