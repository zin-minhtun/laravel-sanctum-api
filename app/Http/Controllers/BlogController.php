<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function getBlogs()
    {
        $blogs = Blog::all();
        return $blogs;
    }

    public function findBlog($id = null)
    {
        $blog = Blog::find($id);

        if ($blog)
            return $blog;
        else
            return ["No match id found.."];
    }

    public function addBlog(Request $request)
    {
        $rules = array(
            'title' => 'required',
            'details' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return $validator->errors();
        } else {
            $blog = new Blog;
            $blog->title = $request->title;
            $blog->details = $request->details;
            $result = $blog->save();
    
            if ($result)
                return ["Added"];
            else
                return ["Error added..."];
        }
    }

    public function updateBlog(Request $request)
    {
        $blog = Blog::find($request->id);
        $blog->title = $request->title;
        $blog->details = $request->details;
        $result = $blog->save();

        if ($result)
            return ["Updated"];
        else
            return ["Error updated..."];
    }

    public function deleteBlog($id = null)
    {
        $blog = Blog::find($id);

        if ($blog) {
            $blog->delete();
            return ["Deleted"];
        } else {
            return ["Error deleted..."];
        }
    }

    public function searchBlogByTitle($query = null)
    {
        $blog = Blog::where('title', 'like', "%" . $query . "%")->get();

        if ($blog)
            return $blog;
        else
            return ["No search item found..."];
    }
}
