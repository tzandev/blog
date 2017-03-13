@extends('home')

@section('content')
    <form action="/register" method="POST">
        {{csrf_field()}}
        <div class="row">
            <div class="box">
                <div class="col-md-6 col-md-offset-3">
                    <hr>
                    <h2 class="intro-text text-center">
                        Sign Up
                    </h2>
                    <hr>
                    @include('errors')
                    <div class="form-group">
                        <label for="name">Username:</label>
                        <input type="text" class="form-control" name="name" placeholder="Type your username here">
                    </div>
                    <div class="form-group">
                        <label for="name">Email:</label>
                        <input type="email" class="form-control" name="email" placeholder="Type your email here">
                    </div>
                    <div class="form-group">
                        <label for="name">Password:</label>
                        <input type="password" class="form-control" name="password" placeholder="Provide a password">
                    </div>
                    <div class="form-group">
                        <label for="name">Password confirmation:</label>
                        <input type="password" class="form-control" name="password_confirmation"
                               placeholder="Repeat your password">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Register">
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection