@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header font-weight-bolder text-white bg-pink">{{ __('Register') }}</div>

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

                                        for($optionIndex=0; $optionIndex < count($someArray); $optionIndex++){


                                            echo '<option value="'.$someArray[$optionIndex]["value"].'" >' . $someArray[$optionIndex]["text"] . '</option>';                                        }

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

                                        for($optionIndex=0; $optionIndex < count($someArray); $optionIndex++){
                                            echo '<option value="'.$someArray[$optionIndex]["value"].'" >' . $someArray[$optionIndex]["text"] . '</option>';
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




                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <div class="d-flex justify-content-between">
                                        <button type="reset" class="btn btn-secondary">
                                            {{ __('Clear') }}
                                        </button>

                                        <button type="submit" class="btn btn-pink">
                                            {{ __('Register') }}
                                        </button>
                                    </div>



                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
<script
        src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
        crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function () {
        getDropdownProvince();
        //getDropdownSex();


    });


    function getDropdownProvince() {
        $.ajax({
            url: "{{route('ddprovinces')}}",
            methods: "GET",
            success: function (result) {
                $('.province').html(result)
            }
        })
    }

    function getDropdownSex() {
        $.ajax({
            url: "{{route('ddsex')}}",
            methods: "GET",
            success: function (result) {
                $('.sex').html(result)
            }
        })
    }


</script>
