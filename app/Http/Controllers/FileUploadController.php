<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function uploadFile(Request $request) {
        $uploaded_file = $request->file->store('public/uploads');
        $blog = new Blog;
        $blog->title = $request->title;
        $blog->details = $request->details;
        $blog->blog_image = $request->file->hashName();
        $result = $blog->save();

        if($result)
            return ['added blog with file'];
        else 
            return ['Error added...'];
    }
}
