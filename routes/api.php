<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/blogs', [BlogController::class, 'getBlogs']);
Route::post('/add-blog', [BlogController::class, 'addBlog']);
Route::get('/blog/{id?}', [BlogController::class, 'findBlog']);
Route::post('/update-blog', [BlogController::class, 'updateBlog']);
Route::delete('/delete-blog/{id?}', [BlogController::class, 'deleteBlog']);
Route::get('/search-blog/{query?}', [BlogController::class, 'searchBlogByTitle']);
Route::post('/upload-file', [FileUploadController::class, 'uploadFile']);

Route::apiResource('post', PostController::class);