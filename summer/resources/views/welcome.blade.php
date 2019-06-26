<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,600|Raleway:600,300|Josefin+Slab:400,700,600italic,600,400italic' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{ asset('css/slick-team-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/5.0.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 80px;
        }

        .titles {
            font-size: 30px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .btn-xls {
            font-size: 30px;
            width: 20%;
        }

    </style>
</head>
<body>

<div class="main-navigation">
    <nav class="navbar navbar-default navbar-expand-md m-0 p-0">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/home') }}">
                BigSurvey
            </a>

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
                    <a class="btn btn-banner" href="{{ url('/home') }}">Home<i class=""></i></a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-banner">Login<i class="fas fa-sign-in-alt"></i></a>
                    &emsp;
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-banner">Register<i class=""></i></a>
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
                <p>น้ำทะเล แค้เธอและฉันที่ดูเหมือนใกล้กัน แต่ความจริงนั้นำกล เหลือเกิน อยากบอกเธอ เมื่อไหร่ที่เธอเหงา</p>
                <hr class="pg-titl-bdr-btm">
            </div>
        <div class="row">

            <div class="col-md-4">
                <div class="service-box">
                    <div class="service-icon"><i class="fa fa-picture-o"></i></div>
                    <div class="service-text">
                        <h3>Design</h3>
                        <p> doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-box">
                    <div class="service-icon"><i class="fa fa fa-code"></i></div>
                    <div class="service-text">
                        <h3>Development</h3>
                        <p> doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-box">
                    <div class="service-icon"><i class="fa fa-diamond"></i></div>
                    <div class="service-text">
                        <h3>Marketing</h3>
                        <p> doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
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
