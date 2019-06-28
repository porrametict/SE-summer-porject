<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Big Survey</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300,600|Raleway:600,300|Josefin+Slab:400,700,600italic,600,400italic'
          rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick-team-slider.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.7.95/css/materialdesignicons.min.css">


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>


</head>
<body>

<div class="main-navigation">
    <nav class="navbar navbar-default navbar-expand-md m-0 p-0">
        <div class="container">
        <!---<a class="navbar-brand" href="{{ url('/') }}">
                BigSurvey
            </a> --->
            <a href="{{ url('/') }}" style="border-radius: 50px; margin: 10px;" class="btn btn-pink"><span
                        class="fa fa-pencil"></span>&nbsp;&nbsp;<b>BIG</b> &nbsp;SURVEY</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar"
                    aria-controls="myNavbar" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="#" class="btn btn-primary" data-toggle="modal"
                           data-target="#exampleModal">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">{{ __('Register') }}</a>
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
                        <a href="{{ route('register') }}" class="btn btn-banner">Register<i
                                    class="mdi mdi-account-plus mt-2"></i></a>
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
            <h1></h1>
            {{--                <p>Answer all your real needs by BigSurvey.</p>--}}
            <hr class="pg-titl-bdr-btm">
        </div>
        <div class="row">

            <div class="col-md-4">
                <div class="service-box">
                    <div class="service-icon"><i class="fa fa-pencil"></i></div>
                    <div class="service-text">
                        <h3>แบบสอบถาม</h3>
                        <p> สร้างแบบสอบถาม สำรวจความพึงพอใจ ได้ง่ายๆ</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-box">
                    <div class="service-icon"><i class="fa fa-pie-chart"></i></div>
                    <div class="service-text">
                        <h3>รายงานผล</h3>
                        <p> รวบรวม แสดงผลในรูปแบบกราฟที่สวยงาม</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-box">
                    <div class="service-icon"><i class="fa fa-share"></i></div>
                    <div class="service-text">
                        <h3>สำรวจ</h3>
                        <p> ส่งแบบสำรวจให้กับกลุ่มคน ที่ต้องการสำรวจ</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--SERVICE END-->

<!-- Button Modal Login Start-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="form-group row mb-0">
                                <button type="submit" class="btn btn-pink btn-block ">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  Button Modal Login end-->

<!--  Button Modal Register start-->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                       class="form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="b_date"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="b_date" type="date"
                                       class="form-control @error('b_date') is-invalid @enderror" name="b_date"
                                       value="{{ old('b_date') }}" required autocomplete="b_date" autofocus>

                                @error('b_date')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class=" row form-group{{ $errors->has('career') ? ' has-error' : '' }}">
                            <label class="col-md-4 col-form-label text-md-right" for="career">Career</label>
                            <div class="col-md-6">
                                <select class="form-control career" name="career" id="career">
                                    <option value="" disabled selected>เลือกอาชีพ</option>
                                    <?php
                                    $someJSON = '[{"text": "กรรมกร", "value": 1} ,
                                                        {"text": "เกษตรกร", "value": 2},
                                                        {"text": "ข้าราชการ", "value": 3},
                                                        {"text": "ครู/อาจารย์", "value": 4},
                                                        {"text": "ค้าขาย", "value": 5},
                                                        {"text": "จิตรกร", "value": 6},
                                                        {"text": "ช่าง", "value": 7},
                                                        {"text": "ตำรวจ", "value": 8},
                                                        {"text": "ทนายความ", "value": 9},
                                                        {"text": "ทหาร", "value": 10},
                                                        {"text": "นักการตลาด", "value": 11},
                                                        {"text": "นักกู้ภัย", "value": 12},
                                                        {"text": "นักถ่ายภาพ", "value": 13},
                                                        {"text": "นักบัญชี", "value": 14},
                                                        {"text": "นักรีวิว", "value": 15},
                                                        {"text": "นักเรียน/นักศึกษา", "value": 16},
                                                        {"text": "นักวางแผนทางการเงิน", "value": 17},
                                                        {"text": "นักวิทยาศาสตร์", "value":18 },
                                                        {"text": "นักออกแบบ", "value": 19},
                                                        {"text": "เน็ตไอดอล", "value": 20},
                                                        {"text": "ผู้ประกอบการธุรกิจ", "value": 21},
                                                        {"text": "ผู้พิพากษา", "value": 22},
                                                        {"text": "พนักงานประจำ", "value": 23},
                                                        {"text": "พยาบาล", "value": 24},
                                                        {"text": "ฟรีแลนซ์", "value": 25},
                                                        {"text": "เลขานุการ", "value": 26},
                                                        {"text": "วิศวกร", "value": 27},
                                                        {"text": "สถาปนิก", "value": 28},
                                                        {"text": "หมอ", "value": 29},
                                                        {"text": "อาชีพในวงการบันเทิง", "value": 30}]';
                                    $someArray = json_decode($someJSON, true);

                                    for ($optionIndex = 0; $optionIndex < count($someArray); $optionIndex++) {


                                        echo '<option value="' . $someArray[$optionIndex]["value"] . '" >' . $someArray[$optionIndex]["text"] . '</option>';
                                    }

                                    ?>


                                </select>
                            </div>

                            @if ($errors->has('career'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('career') }}</strong>
                                        </span>
                            @endif
                        </div>


                        <div class=" row form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                            <label class="col-md-4 col-form-label text-md-right" for="sex">Sex</label>
                            <div class="col-md-6">
                                <select class="form-control sex" name="sex" id="sex">
                                    <option value="" disabled selected>เลือกเพศ</option>
                                    <?php

                                    $someJSON = '[{"text":"ชาย","value":"1"},{"text":"หญิง","value":"2"}]';
                                    $someArray = json_decode($someJSON, true);

                                    for ($optionIndex = 0; $optionIndex < count($someArray); $optionIndex++) {
                                        echo '<option value="' . $someArray[$optionIndex]["value"] . '" >' . $someArray[$optionIndex]["text"] . '</option>';
                                    }

                                    ?>

                                </select>
                            </div>

                            @if ($errors->has('sex'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('sex') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class=" row form-group{{ $errors->has('province') ? ' has-error' : '' }}">
                            <label class="col-md-4 col-form-label text-md-right" for="province">Province</label>
                            <div class="col-md-6">
                                <select class="form-control province" name="province" id="province">
                                    <option value="" disabled>เลือกจังหวัด</option>
                                </select>
                            </div>

                            @if ($errors->has('province'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('province') }}</strong>
                                        </span>
                            @endif
                        </div>

                        <div class="modal-footer d-flex justify-content-between">
                            <div>
                                <button type="reset" class="btn btn-secondary">
                                    {{ __('Clear') }}
                                </button>
                            </div>
                            <DIV>
                                <button type="submit" class="btn btn-pink">
                                    {{ __('Register') }}
                                </button>
                            </DIV>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  Button Modal Register end-->
</body>
</html>
