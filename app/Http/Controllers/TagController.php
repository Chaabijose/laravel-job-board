<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        // Eloquent ORM => get all data
        $tags = Tag::all();
        // pass the data to the view
        return view("tag.index", ["tags" => $tags]);
    }


    public function create()
    {
        Tag::create([
            "title" => "CSS",

        ]);

        return redirect("/tags");
    }

    public function testManyToMany()
    {
        /* $post1 = Post::find(1);
        $post2 = Post::find(2);

        $post1->tags()->attach([1, 2]);
        $post2->tags()->attach([2]);

        return response()->json(([
            'post1' => $post1->tags,
            'post2' => $post2->tags,
        ])); */

        $tag = Tag::find(2);

        $tag->posts()->attach([2]);

        return response()->json(([
            'tag' => $tag->title,
            'posts' => $tag->posts
        ]));
    }
}
