<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    // public function create()
    // {
    //     return view('posts.create');
    // }

    // public function store(SaveRequest $request)
    // {
    //     $post = Post::create($request->validated());
    //     return redirect('/posts/' . $post->id);
    // }

    // public function show(string $id)
    // {
    // $post = Post::findOrFail($id);
    //     return view('posts.show', ['post' => $post]);
    // }

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

    // public function destroy(string $id)
    // {
    //     $post = Post::findOrFail($id);
    //     $post->delete();
    //     return redirect('/posts')->with('success', 'Post deleted successfully');
    // }
}
