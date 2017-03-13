<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return redirect('/posts');
//        $post = Post::first();
//        return view('home', compact('post'));
    }
}
