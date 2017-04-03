@extends('home')

@section('content')
    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center">
                <div id="carousel-example-generic" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="item active">
                            {{--<img class="img-responsive img-full" src="/images/WP_20160207_002.jpg" alt="">--}}
                            <div id="wrapper">
                                <div class="callbacks_container">
                                    <ul class="rslides" id="slider">
                                        <li>
                                            <img src="/images/01.resized.jpg" alt="">
                                        </li>
                                        <li>
                                            <img src="/images/02.resized.jpg" alt="">
                                        </li>
                                        <li>
                                            <img src="/images/03.resized.jpg" alt="">
                                        </li>
                                        <li>
                                            <img src="/images/04.resized.jpg" alt="">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="brand-before">
                    <small>Welcome to</small>
                </h2>
                <h1 class="brand-name">my syte</h1>
                <hr class="tagline-divider">
                <h2>
                    <small>By
                        <strong>tzandev</strong>
                    </small>
                </h2>
            </div>
        </div>
    </div>

@endsection