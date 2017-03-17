@extends('home')

@section('content')
    <div class="row">
        <div class="box">
            <div class="col-md-6 col-md-offset-3">
                <hr>
                <h2 class="intro-text text-center">
                    Change password
                </h2>
                <hr>
                <form action="/settings" method="POST">
                    @include('errors')
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <div class="form-group">
                        <label for="name">Username</label>
                        <fieldset disabled>
                            <input type="text" id="disabledTextInput" class="form-control"
                                   placeholder="{{Auth::user()->name}}">
                        </fieldset>
                    </div>
                    <div class="form-group">
                        <label for="old_password">Old password</label>
                        <input type="password" name="old_password" class="form-control" id="old_password"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="password">New password</label>
                        <input type="password" name="password" class="form-control" id="password"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Password confirmation</label>
                        <input type="password" name="password_confirmation" class="form-control"
                               id="password_confirmation"
                               placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Confirm">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection