@extends('home')

@section('content')

    <form action="/posts/create" method="POST">
        {{csrf_field()}}
        <div class="row">
            <div class="box">
                @include('errors')
                <div class="form-group">
                    <label for="title">Post title:</label>
                    <input type="text" class="form-control" name="title" placeholder="Post title here">
                </div>
                <div class="form-group">
                    <label for="body">Post body:</label>
                    <textarea name="body" class="form-control" cols="30" rows="10"
                              placeholder="Post body here"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Add Post">
                </div>
            </div>
        </div>
    </form>

@endsection