<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eloquent ORM => get all data
        $comments = Comment::all();
        // pass the data to the view
        return view("comment.index", ["comments" => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Comment::factory(5)->create();

        return view("comment/create", ["pageTitle" => "Comments - Create  Comment"]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //TODO: this will be completed in the form section
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $comments = Comment::find($id);
        return view("comment/list", ["comments" => $comments, "pageTitle" => "Comments"]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("comment/edit", ["pageTitle" => "Comments - Edit Comment"]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //TODO: this will be completed in the form section
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //TODO: this will be completed in the form section
    }
}
