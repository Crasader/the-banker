@extends('front.default')
@section('title')Login @Stop
@section('content')

    <!-- start: page -->
    <section class="body-sign">
        <div class="center-sign">
            @if (isset($success))
                <div class="success alert-success" style="padding-bottom:10px;">
                    <strong>{{ $success }}</strong>
                </div>
            @endif

            @if (count($errors) > 0)
                <div class="alert alert-danger" style="">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!--a href="/" class="logo pull-left">
                <img src="assets/images/logo-full.png" height="54" alt="Porto Admin" />
            </a-->

            <div class="panel panel-sign">
                <div class="panel-title-sign mt-xl text-right">
                    <h2 class="title text-uppercase text-weight-bold m-none"><i class="fa fa-user mr-xs"></i> Sign In</h2>
                </div>
                <div class="panel-body">
                    {!! Form::open(array('url'=>'login','method'=>'POST')) !!}
                        <div class="form-group mb-lg">
                            <label>Username</label>
                            <div class="input-group input-group-icon">
                                {!! Form::email('email', '', array('class'=>'form-control input-lg','placeholder'=> 'Email','tabindex'=>'1')) !!}
                                <span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-user"></i>
										</span>
									</span>
                            </div>
                        </div>

                        <div class="form-group mb-lg">
                            <div class="clearfix">
                                <label class="pull-left">Password</label>
                                <a href="{{URL::route('forgot-password')}}" class="pull-right">Lost Password?</a>
                            </div>
                            <div class="input-group input-group-icon">
                                {!! Form::password('password', array('class'=>'form-control input-lg','placeholder'=>'Password','tabindex'=>'2')) !!}
                                <span class="input-group-addon">
										<span class="icon icon-lg">
											<i class="fa fa-lock"></i>
										</span>
									</span>
                            </div>
                        </div>
                    @if ($_COOKIE['country_code'] != "CN")
                        <div class="form-group" align="center">
                            <div class="input-group ">
                                {!! app('captcha')->display() !!}
                            </div>
                        </div>
                    @endif
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="checkbox-custom checkbox-default">
                                    <input id="RememberMe" name="rememberme" type="checkbox"  type="checkbox" value="1"/>
                                    <label for="RememberMe">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-sm-4 text-right">
                                <button type="submit" class="btn btn-primary hidden-xs">Sign In</button>
                                <button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign In</button>
                            </div>
                        </div>

                        <span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>or</span>
							</span>

                        <p class="text-center">Don't have an account yet? <a href="{{ url('/signup') }}">Sign Up!</a></p>

                    {!! Form::close() !!}
                </div>
            </div>

            <p class="text-center text-muted mt-md mb-md">{{ env('SITE_NAME') }} &copy; Copyright {{ date('Y') }}. All Rights Reserved.</p>
        </div>
    </section>
    <!-- end: page -->

    @Stop