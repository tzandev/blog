@extends('home')

@section('content')
    <form action="/posts/edit/{{$post->id}}" method="POST">
        {{csrf_field()}}
        {{method_field('patch')}}
        <div class="row">
            <div class="box">
                @include('errors')
                <div class="form-group">
                    <label for="title">Post title:</label>
                    <input type="text" class="form-control" name="title" value="{{$post->title}}">
                </div>
                <div class="form-group">
                    <label for="body">Post body:</label>
                    <textarea name="body" class="form-control" cols="30" rows="10">{{$post->body}}</textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
            </div>
        </div>
    </form>

@endsection