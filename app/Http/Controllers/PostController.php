<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
//        $channels = Channel::orderBy('name')->get();

        return view('post.create');
    }

    public function index()
    {
        return Post::all();
    }
}
