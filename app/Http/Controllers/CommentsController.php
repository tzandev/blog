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
        if (!$post) {
            return back();
        }
        $comment = new Comment();
        $comment->body = request('comment_body');
        $comment->post_id = $id;
        $comment->user_id = Auth::id();
        $comment->save();
        session()->flash('message', 'Your comment has been added successfully!');
        return redirect('/posts/' . $id);
    }


    public function destroy($id)
    {
        $comment = Comment::find($id);
        if ($comment && Auth::user()->isAdmin()) {
            $comment->delete();
        }
        session()->flash('message', 'The comment has been deleted!');
        return redirect('/posts/' . $comment->post->id);
    }
}
