<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        // Eloquent ORM => get all data
        $comments = Comment::all();
        // pass the data to the view
        return view("comment.index", ["comments" => $comments]);
    }

    /*  public function show($id)
     {
         $comment = Comment::find($id);
         return view("comment.list", ["comment" => $comment]);
     } */

    public function create()
    {
        /*  Comment::create([
             "author" => "kalilo ajjiemi",
             "content" => "This is my third comment test",
             "post_id" => 2,
         ]); */

        Comment::factory(5)->create();

        return redirect("/comments");
    }


}
