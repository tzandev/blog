<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create($id = null)
    {
        $this->validate(request(), [
            'comment_body' => 'required'
        ]);
        $post = Post::find($id);
        if (!$post){
            return back();
        }
        if (!Auth::check()) {
            return redirect('/posts');
        }
        $comment = new Comment();
        $comment->body = request('comment_body');
        $comment->post_id = $id;
        $comment->user_id = Auth::id();
        $comment->save();
        return redirect('/posts/' . $id);
    }
}
