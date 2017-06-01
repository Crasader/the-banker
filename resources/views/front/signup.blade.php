@extends('front.default')
@section('title'){{trans('front.sign_up')}} @Stop
@section('content')
    <div class="fullscreen-bg">
        <video preload="none" autoplay="true" muted loop="true" poster="{{asset('assets_old/videos/city_screenshot.jpg')}}" class="fullscreen-bg__video">
            <source src="{{asset('assets_old/videos/city.mp4')}}" type="video/mp4">
        </video>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="hidden-sm hidden-xs" style="margin-left:-130px; margin-top:100px; margin-bottom:-100px;">
                    <img src="{{asset('assets_old/images/logo_large.png')}}" width="600"/>
                </div>
                <div class="login-panel panel panel-default">
                    <img class="visible-sm visible-xs" src="{{asset('assets_old/images/logo_large.png')}}" width="100%" style="margin-top:-80px;"/>
                    <div style="color:white; font-weight:bold; text-align:center; font-size:18px; padding-top:20px;">{{trans('front.signup_new_account')}}</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger" style="background-color:transparent; border:none; color:#F00;">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {!! Form::open(array('url'=>'signup','method'=>'POST')) !!}
                        {!! Form::hidden('referral', $referral, array('class'=>'form-control','placeholder'=>trans('front.referral'))) !!}
                        {!! Form::hidden('position', $position, array('class'=>'form-control','placeholder'=>trans('front.referral'))) !!}
                        <fieldset>
                            <div class="form-group">
                                {!! Form::email('email', '', array('class'=>'form-control','placeholder'=>trans('front.email'))) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::password('password', array('class'=>'form-control','placeholder'=>trans('front.password'))) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::password('repassword', array('class'=>'form-control','placeholder'=>trans('front.confirm_password'))) !!}
                            </div>

                            <div class="form-group" id="position" style="color:white;">
                                <label class="col-md-3 control-label" for="inputDefault">Referrer</label>
                                <div class="col-md-9">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="referrer" id="default" value="default">
                                            Default (Username: {{ $referral }})
                                        </label>
                                    </div>
                                    <div>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="referrer" id="manual" value="manual" checked>
                                                Manual
                                            </label>
                                        </div>

                                        <div class="form-group" id="referrer">
                                            <div class="input-group ">
                                            {!! Form::text('alias', '', array('id'=>'alias','class'=>'form-control','placeholder'=>'Username')) !!}
                                            <span class="input-group-addon">
                                            <span id="usericon" class="icon"></span>
                                            </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           @if ($_COOKIE['country_code'] != "CN")
                            <div class="form-group" align="center">
                                <div class="input-group ">
                                    {!! app('captcha')->display() !!}
                                </div>
                            </div>
                            @endif
                            <!-- Change this to a button or input when using this as a form -->
                            {!! Form::submit(trans('front.sign_up'), array('class'=>'btn btn-primary btn-quirk btn-block')) !!}
                            <br>
                            <a href="{{URL::route('login')}}" class="btn btn-default btn-block">{{trans('front.already_a_member')}} {{trans('front.login_now')}}</a>
                        </fieldset>
                        {!! Form::close() !!}
                    </div>

                    <div class="pull-left" style="padding:15px;"><a href="{{env('SITE_URL')}}">{{trans('front.back_to_website')}}</a></div>

                    <div id="polyglotLanguageSwitcher" class="front_langchooser">
                        <form id="updatelang" action="{{URL::route('set-locale')}}">
                            <select id="polyglot-language-options">
                                <option id="en" value="en" @if(Lang::locale() == 'en') selected @endif>English</option>
                                <option id="cn" value="cn" @if(Lang::locale() == 'cn') selected @endif>中文</option>
                            </select>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        $('#manual').change(function(){
            $('#referrer').toggle();
        });

        $('#default').change(function(){
            $('#referrer').toggle();
        });

        $('#alias').keyup(function(){
            check_upline();
        });

        $('#alias').change(function(){
            check_upline();
        });

        function check_upline(){
            var alias = $('#alias').val();

            var loadUrl = '{{ URL::to('/') }}/check-alias/' + alias;
            $.ajax({
                url: loadUrl, success: function (result) {
                    if (result == "KO") {
                        $('#usericon').html('<i class="fa fa-check text-success"></i>');
                    } else {
                        $('#usericon').html('<i class="fa fa-remove text-danger"></i>');
                    }
                }
            });
        }
    </script>
    @Stop