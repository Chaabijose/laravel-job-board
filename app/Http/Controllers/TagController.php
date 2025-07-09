<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Eloquent ORM => get all data
        $tags = Tag::all();
        // pass the data to the view
        return view("tag/index", ["tags" => $tags], ["pageTitle" => "Tags - View all tags"]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("tag/create", ["pageTitle" => "Tag - Create Tag"]);
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
        $tags = Tag::find($id);
        return view("tag/list", ["tags" => $tags, "pageTitle" => "Tags"]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view("tag/edit", ["pageTitle" => "Tags - Edit Tag"]);

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
