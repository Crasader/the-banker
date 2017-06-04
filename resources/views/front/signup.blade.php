@extends('front.default')
@section('title') Register new account @Stop
@section('content')
    <!-- start: page -->
    <section class="body-sign">
        <div class="center-sign">
            {{--<a href="/" class="logo pull-left">--}}
            {{--<img src="assets/images/logo.png" height="54" alt="Porto Admin" />--}}
            {{--</a>--}}
            @if (count($errors) > 0)
                <div class="alert alert-danger"
                     style="">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Sign Up
                    </h2>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('url'=>'signup','method'=>'POST')) !!}
                    {!! Form::hidden('referral', $referral, array('class'=>'form-control','placeholder'=>'referral')) !!}
                    {!! Form::hidden('position', $position, array('class'=>'form-control','placeholder'=>'referral')) !!}
                        <div class="form-group mb-lg">
                            <label>E-mail Address</label>
                            {!! Form::email('email', '', array('class'=>'form-control input-lg','placeholder'=>'Email')) !!}
                        </div>
                        <div class="form-group mb-none">
                            <div class="row">
                                <div class="col-sm-6 mb-lg">
                                    <label>Password</label>
                                    {!! Form::password('password', array('class'=>'form-control input-lg','placeholder'=>trans('Password'))) !!}
                                </div>
                                <div class="col-sm-6 mb-lg">
                                    <label>Password Confirmation</label>
                                    {!! Form::password('repassword', array('class'=>'form-control input-lg','placeholder'=>trans('Confirm Password'))) !!}
                                </div>
                            </div>
                        </div>
                         <hr>
                    <div class="form-group mb-lg">
                            <label class="control-label">Referrer <span class="required" aria-required="true">*</span></label>
                            <div >
                                <div class="radio-custom radio-primary">
                                    <input type="radio" name="referrer" id="default" value="default">
                                    <label for="awesome">Default (Username: {{ $referral }})</label>
                                </div>
                                <div class="radio-custom radio-primary">
                                    <input type="radio" name="referrer" id="manual" value="manual" checked>
                                    <label for="very-awesome">Manual</label>
                                </div>
                                <div class="form-group" id="referrer">
                                    <div class="input-group input-group-icon">
                                        {!! Form::text('alias', '', array('id'=>'alias','class'=>'form-control','placeholder'=>'Username')) !!}
                                        <span class="input-group-addon">
															<span id="usericon" class="icon"></span>
                                            </span>
                                    </div>
                                </div>
                        </div>
                    </div>
                        <div class="row">
                            @if ($_COOKIE['country_code'] != "CN")
                                <div class="form-group" align="center">
                                    <div class="input-group ">
                                        {!! app('captcha')->display() !!}
                                    </div>
                                </div>
                            @endif
                            <div class="col-sm-8">
                                <div class="checkbox-custom checkbox-default">
                                    <input id="AgreeTerms" name="agreeterms" type="checkbox"/>
                                    <label for="AgreeTerms">I agree with <a href="#">terms of use</a></label>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">
                                <button type="submit" class="btn btn-primary hidden-xs">Sign Up</button>
                                <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign
                                    Up
                                </button>
                            </div>
                        </div>

                        <span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>or</span>
							</span>
                        <p class="text-center">Already have an account? <a href="{{ url('/signin') }}">Sign In!</a></p>
                    </form>
                </div>
            </div>
            <p class="text-center text-muted mt-md mb-md">{{ env('SITE_NAME') }} &copy; Copyright {{ date('Y') }}. All
                Rights Reserved.</p>
        </div>
    </section>
    <!-- end: page -->
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
                            <a href="{{URL::route('login')}}"
                               class="btn btn-default btn-block">{{trans('front.already_a_member')}} {{trans('front.login_now')}}</a>
                        </fieldset>
                        {!! Form::close() !!}
                    </div>

                    <div class="pull-left" style="padding:15px;"><a
                                href="{{env('SITE_URL')}}">{{trans('front.back_to_website')}}</a></div>

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
        $('#manual').change(function () {
            $('#referrer').toggle();
        });

        $('#default').change(function () {
            $('#referrer').toggle();
        });

        $('#alias').keyup(function () {
            check_upline();
        });

        $('#alias').change(function () {
            check_upline();
        });

        function check_upline() {
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