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

    // public function show(string $id)
    // {
    //     $post = Category::findOrFail($id);
    //     $categories = Category::all()->pluck('name', 'id');
    //     return view('admin.posts.show', compact('post', 'categories'));
    // }


    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/admin/categories')->with('success', 'Category deleted successfully');
    }
}
