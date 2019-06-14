@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('user_edit') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{$user->name}}" required autocomplete="name" autofocus>

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
                                           value="{{$user->email}}" readonly required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="b_date"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Birth date') }}</label>

                                <div class="col-md-6">
                                    <input id="b_date" type="date"
                                           class="form-control @error('b_date') is-invalid @enderror" name="b_date"
                                           value="{{ $user->b_date }}" required autocomplete="b_date" autofocus>

                                    @error('b_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="career"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Career') }}</label>

                                <div class="col-md-6">
                                    <input id="career" type="text"
                                           class="form-control @error('career') is-invalid @enderror" name="career"
                                           value="{{ $user->career }}" required autocomplete="career" autofocus>

                                    @error('career')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class=" row form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
                                <label class="col-md-4 col-form-label text-md-right" for="sex">Sex</label>
                                <div class="col-md-6">
                                    <select class="form-control sex" name="sex" id="sex">
                                        <option value="">เลือกเพศ</option>
                                        @foreach($sexes as $sex)
                                            @if($user->sex->id ==  $sex->id)
                                            <option value="{{$sex->id}}" selected>{{$sex->text}}</option>
                                            @else
                                            <option value="{{$sex->id}}" >{{$sex->text}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                @if ($errors->has('sex'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('sex') }}</strong>
                                        </span>
                                @endif
                            </div>
{{--                            commeny--}}


                            <div class=" row form-group{{ $errors->has('province') ? ' has-error' : '' }}">
                                <label class="col-md-4 col-form-label text-md-right" for="province">Province</label>
                                <div class="col-md-6">
                                    <select class="form-control province" name="province" id="province">
                                        <option value="">เลือกจังหวัด</option>

                                        @foreach($provinces as $p)
                                            @if($user->province->id ==  $p->id)
                                                <option value="{{$p->id}}" selected>{{$p->name_th}}</option>
                                            @else
                                                <option value="{{$p->id}}" >{{$p->name_th}}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                </div>

                                @if ($errors->has('province'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('province') }}</strong>
                                        </span>
                                @endif
                            </div>
                            <hr>
                            <div class="change-pass">

                                <div class="form-group row">
                                    <label for="old_password"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Old Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="old_password" type="password"
                                               class="form-control @error('old_password') is-invalid @enderror" name="old_password"
                                                autocomplete="old_password">

                                        @error('old_password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror

                                        @if(\Session::has('error'))
                                            <span class="text-danger" >
                                            <strong>{{ \Session::get('error') }}</strong>
                                                @endif

                                    </span>
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror" name="password"
                                                autocomplete="password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm"
                                           class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation"  autocomplete="password">
                                    </div>
                                </div>

                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                    <button type="reset" class="btn btn-warning">
                                        {{ __('Reset') }}
                                    </button>
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


    });


    {{--function getDropdownProvince() {--}}
    {{--    $.ajax({--}}
    {{--        url: "{{route('ddprovinces')}}",--}}
    {{--        methods: "GET",--}}
    {{--        success: function (result) {--}}
    {{--            $('.province').html(result)--}}
    {{--        }--}}
    {{--    })--}}
    {{--}--}}



</script>
