<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.all', compact('posts'));
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store()
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);
        $post = new Post();
        $post->title = request('title');
        $post->body = request('body');
        $post->user_id = Auth::id();
        $post->save();
        return redirect('/posts');
    }
    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect('/posts');
        }
        return view('posts.show', compact('post'));
    }
    public function edit($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect('/posts');
        }
        if (Auth::id() != $post->user_id) {
            return redirect('/posts');
        }
        return view('posts.edit', compact('post'));
    }
    public function update($id)
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);
        $post = Post::find($id);
        if (!$post) {
            return redirect('/posts');
        }
        if (Auth::id() != $post->user_id) {
            return redirect('/posts');
        }
        $post->title = request('title');
        $post->body = request('body');
        $post->save();
        return redirect('/posts/' . $id);
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return redirect('/posts');
        }
        if (Auth::id() != $post->user_id) {
            return redirect('/posts');
        }
        $post->delete();
        return redirect('/posts');
    }
}
