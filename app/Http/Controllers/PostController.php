<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eloquent ORM => get all data
        $posts = Post::latest()->cursorPaginate(5);
        // pass the data to the view
        return view("post.index", ["posts" => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("post/create", ["pageTitle" => "Blog - Create Post"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogPostRequest $request)
    {
        $post = new Post();
        $post->title = $request->input("title");
        $post->author = $request->input("author");
        $post->body = $request->input("body");
        $post->published = $request->has("published");

        $post->save();

        // Redirection
        return redirect('/post')->with('success', 'Post created successfully ');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view("post.list", ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // 1. Récupérer le post par ID (ou échouer avec 404)
        $post = Post::findOrFail($id);
        return view("post/edit", [
            'post' => $post,
            'pageTitle' => 'Edit Post : ' . $post->title,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogPostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);

        $post->title = $request->input("title");
        $post->author = $request->input("author");
        $post->body = $request->input("body");
        $post->published = $request->has("published");

        $post->save();

        // Redirection
        return redirect('/post')->with('success', 'Post updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id); // 404 si introuvable

        $post->delete(); // Suppression en base
        return redirect('/post')->with('success', 'Post deleted successfully ');

    }
}
