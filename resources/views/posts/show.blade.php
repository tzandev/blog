@extends('home')
@section('content')
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">
                    {{$post->title}}
                </h2>
                <hr>
                <p class="text-justify">{!! nl2br(e($post->body)) !!}</p>
                <small>Posted on {{$post->created_at->toFormattedDateString()}} by
                    <em><b>{{ $post->user->name }}</b></em></small>
            </div>
            @if(Auth::id() == $post->user_id)
                <form action="/posts/edit/{{$post->id}}" method="get">
                    {{csrf_field()}}
                    <div id="button-left"><input type="submit" class="btn btn-primary" value="Edit Post"></div>
                </form>
                <form action="/posts/delete/{{$post->id}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                    <div id="button-right"><input type="submit" class="btn btn-primary" value="Delete Post"></div>
                </form>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">
                    Comments
                </h2>
                <hr>
            </div>
        </div>
    </div>
    @foreach($post->comments as $comment)
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <p>{{$comment->body}}</p>
                    @if(Auth::check() && Auth::user()->isAdmin())
                        <form action="/posts/comments/delete/{{$comment->id}}" method="post">
                            {{csrf_field()}}
                            <input type="submit" class="btn btn-primary text-right" value="Delete comment">
                        </form>
                        @endif
                    <small>Commented on {{$comment->created_at->toFormattedDateString()}} by
                        <em><b>{{ $comment->user->name }}</b></em></small>
                </div>
            </div>
        </div>
    @endforeach
    @if(Auth::check())
        <form action="/posts/{{$post->id}}/comment/create" method="post">
            {{csrf_field()}}
            <div class="row">
                <div class="box">
                    <div class="form-group">
                        <label for="comment_body">Add your comment:</label>
                        <textarea class="form-control" name="comment_body" id="comment_body" cols="30" rows="10"
                                  placeholder="Comment"></textarea>
                    </div>
                    <div>
                        <input type="submit" class="btn btn-primary" value="Add new comment">
                    </div>
                </div>
            </div>
        </form>
    @else
        <div class="row">
            <div class="box">
                Want to add a comment? - <a href="/login">Sign In!</a>
            </div>
        </div>
    @endif
@endsection
