<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Eloquent ORM => get all data
        $posts = Post::cursorPaginate(5);
        // pass the data to the view
        return view("post.index", ["posts" => $posts]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view("post.list", ["post" => $post]);
    }

    public function create()
    {
        /*  Post::create([
             "title" => "My Third",
             "body" => "This is my third content",
             "author" => "Stella brus",
             "published" => true,
         ]); */

        Post::factory(100)->create();

        return redirect("/blog");
    }

    public function delete()
    {
        Post::destroy(3);
    }
}
