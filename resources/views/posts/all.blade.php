@extends('home')

@section('content')
    @foreach($posts as $post)
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <div><a href="/posts/{{$post->id}}">{{$post->title}}</a></div>
                        <small>Posted on {{$post->created_at->toFormattedDateString()}} by
                            <em><b>{{ $post->user->name }}</b></em></small>
                    </h2>
                    <hr>
                    <p class="text-justify">{!! nl2br(e(str_limit($post->body, 500))) !!}</p>
                    <div class="text-center">
                        <a href="/posts/{{$post->id}}" class="btn btn-default btn-lg">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection