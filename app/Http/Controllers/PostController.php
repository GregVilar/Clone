<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Fetch all posts
    public function index()
    {
        $posts = Post::all();
        return view('manage-post', compact('posts'));
    }

    // Show the form to create a new post
    public function create()
    {
        return view('users-create');
    }

    // Store a new post
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $post = new Post();
        $post->name = $request->input('name');
        $post->age = $request->input('age');
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();

        return redirect()->route('manage-post')->with('success', 'Post created successfully!');
    }

    // Show the form to edit an existing post
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('users-edit', compact('post'));
    }

    // Update an existing post
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->name = $request->input('name');
        $post->age = $request->input('age');
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->save();

        return redirect()->route('manage-post')->with('success', 'Post updated successfully!');
    }

    // Show a specific post
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('users-show', compact('post'));
    }

    // Delete an existing post
    public function destroy($id)
{
    $post = Post::findOrFail($id);
    $post->delete();

    return redirect()->route('manage-post')->with('success', 'Post deleted successfully!');
}

}
