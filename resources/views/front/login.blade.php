@extends('front.default')
@section('title')Login @Stop
@section('content')

    <div class="fullscreen-bg">
        <video preload="none" autoplay="true" loop="true" muted poster="{{asset('assets_old/videos/city_screenshot.jpg')}}" class="fullscreen-bg__video">
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
                    <div style="color:white; font-weight:bold; text-align:center; font-size:18px; padding-top:20px;">{{trans('front.welcome_please_login')}}</div>
                    <div class="panel-body">

                        @if (isset($success))
                            <div class="success alert-success" style="background-color:transparent; padding-bottom:10px;">
                                <strong>{{ $success }}</strong>
                            </div>
                        @endif

                        @if (count($errors) > 0)
                            <div class="alert alert-danger" style="background-color:transparent; border:none; color:#F00;">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <fieldset>

                            {!! Form::open(array('url'=>'login','method'=>'POST')) !!}
                            <div class="form-group">
                                {!! Form::email('email', '', array('class'=>'form-control','placeholder'=>trans('front.email'),'tabindex'=>'1')) !!}
                            </div>

                            <div class="form-group">
                                {!! Form::password('password', array('class'=>'form-control','placeholder'=>trans('front.password'),'tabindex'=>'2')) !!}
                            </div>
                            @if ($_COOKIE['country_code'] != "CN")
                            <div class="form-group" align="center">
                                <div class="input-group ">
                                    {!! app('captcha')->display() !!}
                                </div>
                            </div>
                            @endif
                            <div class="pull-right small" style="padding-top:13px;"><a href="{{URL::route('forgot-password')}}">{{trans('front.forgot_password')}}</a></div>
                            <div class="checkbox pull-left">
                                <label style="color:white;">
                                    <input name="rememberme" type="checkbox" value="1">{{trans('front.remember_me')}}
                                </label>
                            </div>
                            {!! Form::submit(trans('front.login'), array('class'=>'btn btn-primary btn-block')) !!}
                            <br>
                            <a href="{{URL::route('signup')}}" class="btn btn-default btn-block">{{trans('front.not_a_member_sign_up')}}</a>
                            {!! Form::close() !!}
                        </fieldset>
                    </div>

                    <div class="pull-left" style="padding:15px;"><a href="{{env('SITE_URL')}}">{{trans('front.back_to_website')}}</a></div>

                    <div id="polyglotLanguageSwitcher" class="front_langchooser" style="margin-right:15px;">
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
        $('video').on('ended', function () {
            this.load();
            this.play();
        });


    </script>


    @Stop