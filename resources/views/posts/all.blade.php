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
                        <p>{{$post->body}}</p>
                    </div>
                </div>
            </div>
        @endforeach
@endsection