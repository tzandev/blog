@extends('home')

@section('content')
    <div class="row">
        <div class="box">
            <div class="col-md-6 col-md-offset-3">
                <hr>
                <h2 class="intro-text text-center">
                    Sign in
                </h2>
                <hr>
                <form action="/login" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">Username</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="password">Email address</label>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Sign In">
                        <div style="float: right">or <a href="/register">Sign Up</a></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection