<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tzandev's blog</title>
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/vendor/bootstrap/css/bootstrap-social.css" rel="stylesheet" type="text/css">
    <link href="/css/app.css" rel="stylesheet" type="text/css">
    <link href="/css/responsiveslides.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
          rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic"
          rel="stylesheet" type="text/css">
</head>
<body>
<div class="brand">tzandev's Blog</div>
<div class="address-bar">my site</div>
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">tzandev's Blog</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a href="/posts">Posts</a></li>
                @if(Auth::check())
                    @if(Auth::user()->isAdmin())
                        <li><a href="/posts/create">New Post</a></li>
                    @endif
                    <li><a href="/settings">Profile</a></li>
                    <li><a href="/logout">Log Out</a></li>
                @else
                    <li><a href="/register">Register</a></li>
                    <li><a href="/login">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@if($flash = session('message'))
    <div id="flash-message">
        {{$flash}}
    </div>
@endif
<div class="container">
    @yield('content')
</div>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>Copyright &copy; tzandev - {{\Carbon\Carbon::now()->year}}
                    <a href="https://www.facebook.com/tzandev" class="btn btn-social btn-facebook col-md-offset-3"
                       target="_blank">
                        <span class="fa fa-facebook">f</span>Facebook
                    </a>
                    <a href="https://github.com/tzandev" class="btn btn-social btn-github col-lg-offset-0"
                       target="_blank">
                        <span class="fa fa-github text-right">G</span>GitHub
                    </a>
                </p>
            </div>
        </div>
    </div>
</footer>
<script src="/js/app.js"></script>

</body>
</html>