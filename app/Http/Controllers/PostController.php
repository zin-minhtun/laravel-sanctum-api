<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return ['response' => $posts];
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return [];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = array(
            'title' => 'required',
            'descriptions' => 'required',
        );

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return $validator->errors();
        } else {
            $post = new Post;
            $post->title = $request->title;
            $post->descriptions = $request->descriptions;
            $result = $post->save();
    
            if($result)
                return "Added post";
            else
                return "Error added...";
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        if($post)
            return ['response' => $post];
        else
            return 'No match post found...';
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return [];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->descriptions = $request->descriptions;
        $result = $post->save();
        if($result)
            return 'Updated';
        else
            return 'Error updated...';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if($post){
            $post->delete();
            return ['Deleted'];
        } else {
            return ['Error deleted...'];
        }
    }
}
