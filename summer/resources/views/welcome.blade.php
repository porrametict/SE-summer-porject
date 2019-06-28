<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Big Survey</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,600|Raleway:600,300|Josefin+Slab:400,700,600italic,600,400italic' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick-team-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.7.95/css/materialdesignicons.min.css">


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</head>
<body>

<div class="main-navigation">
    <nav class="navbar navbar-default navbar-expand-md m-0 p-0">
        <div class="container">
            <!---<a class="navbar-brand" href="{{ url('/') }}">
                BigSurvey
            </a> --->
            <a href="{{ url('/') }}" style="border-radius: 50px; margin: 10px;" class="btn btn-pink"><span class="fa fa-pencil"></span>&nbsp;&nbsp;<b>BIG</b> &nbsp;SURVEY</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar"
                    aria-controls="myNavbar" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else



                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('user_edit') }}"
                            >
                                Edit
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>

                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</div>
<!--BANNER START-->
<div id="banner" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="jumbotron">
                <h1 class="small">Welcome To <span class="bold">BigSurvey</span></h1>
                <p class="big">Create Questionnaire & Survey</p>
                @auth
                    <a class="btn btn-banner" href="{{ url('/home') }}">Go to Home<i class="fa fa-home"></i></a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-banner">Login<i class="mdi mdi-login mt-2"></i> </a>
                    &emsp;
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-banner">Register<i class="mdi mdi-account-plus mt-2"></i></a>
                    @endif
                @endauth
            </div>
        </div>
    </div>
</div>
<!--BANNER END-->

<!--CTA1 START-->
<div class="cta-1">
    <div class="container">
        <div class="text-center white">
            <h1 class="cta-title ">The Best Survey</h1>
        </div>
    </div>
</div>
<!--CTA1 END-->

<!--SERVICE START-->
<div id="service" class="section-padding">
    <div class="container">

            <div class="page-title text-center">
                <h1>Our Service</h1>
                <p>Answer all your real needs by BigSurvey.</p>
                <hr class="pg-titl-bdr-btm">
            </div>
        <div class="row">

            <div class="col-md-4">
                <div class="service-box">
                    <div class="service-icon"><i class="fa fa-picture-o"></i></div>
                    <div class="service-text">
                        <h3>Design</h3>
                        <p> Design and creative you Survey form easily.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-box">
                    <div class="service-icon"><i class="fa fa fa-code"></i></div>
                    <div class="service-text">
                        <h3>Unique</h3>
                        <p> convenient, beautiful and uniqueness.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-box">
                    <div class="service-icon"><i class="fa fa-diamond"></i></div>
                    <div class="service-text">
                        <h3>Share</h3>
                        <p> Share to the group of people you want to explore..</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--SERVICE END-->
</div>
</body>
</html>
