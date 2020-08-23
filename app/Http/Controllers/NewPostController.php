<?php

namespace App\Http\Controllers;

use App\NewPost;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class NewPostController extends Controller
{
    public function index()
    {
        $newPosts = NewPost::allPosts();

        return view('new_post.index', [
            'newPosts' => $newPosts
        ]);
    }
}
