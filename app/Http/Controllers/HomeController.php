<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = array(Post::latest()->first());
        return view('posts.all', compact('posts'));
    }
}
