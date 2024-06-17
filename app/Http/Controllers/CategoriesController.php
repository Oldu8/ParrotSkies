<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Categories\CategoriesSaveRequest;

class CategoriesController extends Controller
{
    public function index()
    {
        // $categories = Category::withCount('posts')->get();
        // $posts = Post::paginate(10);
        $categories = Category::withCount('posts')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoriesSaveRequest $request)
    {
        $category = Category::create($request->validated());
        return redirect('admin/categories/')->with('success', 'Category created!');
    }

    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        $posts = $category->posts;
        // dd($posts);
        // $categories = Category::all()->pluck('name', 'id');
        return view('admin.categories.edit', compact('category', 'posts'));
    }

    public function update(CategoriesSaveRequest $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->validated());
        return redirect('admin/categories/')->with('success', 'Category updated!');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect('/admin/categories')->with('success', 'Category deleted successfully');
    }
}
