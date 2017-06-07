<!doctype html>
<html class="left-sidebar-panel sidebar-light">
<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>@yield('title') &bull; {{env('SITE_NAME')}}</title>
    <meta name="keywords" content="{{env('SITE_NAME')}} dashboard"/>
    <meta name="description" content="Generate unlimited income">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="hexto" content="{{ csrf_token() }}">
    <meta name="hexid" content="{{ Auth::user()->id }}">

    <link rel="shortcut icon" type="image/png" href="{{asset('favicon.png')}}"/>
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light"
          rel="stylesheet" type="text/css">
    <!--
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
    -->
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/simple-line-icons/css/simple-line-icons.css')}}"/>

    <link rel="stylesheet" href="{{asset('assets/vendor/magnific-popup/magnific-popup.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}"/>

    <link rel="stylesheet" href="{{asset('assets/plugin/flagstrap/css/flags.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/plugin/countdownTimer/CSS/jquery.countdownTimer.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/morris.js/morris.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/select2/css/select2.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/jquery-datatables-bs3/assets/css/datatables.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/pnotify/pnotify.custom.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/jorgchart/jquery.jOrgChart.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/jorgchart/prettify.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/stylesheets/theme.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/stylesheets/skins/default.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/stylesheets/theme-custom.css')}}">
    <script src="{{asset('assets/vendor/modernizr/modernizr.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery/jquery.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('assets/vendor/magnific-popup/jquery.magnific-popup.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-placeholder/jquery-placeholder.js')}}"></script>
    <script src="{{asset('assets/plugin/polygot/js/jquery.polyglot.language.switcher.js')}}"></script>
    <script src="{{asset('assets/plugin/flagstrap/js/jquery.flagstrap.min.js')}}"></script>
    <script src="{{asset('assets/plugin/countdownTimer/jquery.countdownTimer.js')}}"></script>
    <script src="{{asset('assets/vendor/select2/js/select2.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-datatables/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-datatables-bs3/assets/js/datatables.js')}}"></script>
    <script src="{{asset('assets/vendor/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('assets/vendor/flot.tooltip/flot.tooltip.js')}}"></script>
    <script src="{{asset('assets/vendor/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('assets/vendor/flot/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('assets/vendor/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('assets/vendor/raphael/raphael.js')}}"></script>
    <script src="{{asset('assets/vendor/morris.js/morris.js')}}"></script>
    <script src="{{asset('assets/plugin/dateformat/jquery-dateFormat.js')}}"></script>
    <script src="{{asset('assets/vendor/jquery-appear/jquery-appear.js')}}"></script>
    <script src="{{asset('assets/vendor/pnotify/pnotify.custom.js')}}"></script>
    <script src="{{asset('assets/vendor/jorgchart/jquery.jOrgChart.js')}}"></script>
    <script src="{{asset('assets/vendor/jorgchart/prettify.js')}}"></script>

</head>
<body>

<div id="darkoverlay"></div>

<section id="wrapper" class="body">

    <!-- start: header -->
    <header class="header">
        <div class="logo-container">
            <a href="{{URL::route('home')}}" class="logo">
                <img src="{{asset('assets/images/logo.png')}}" height="35" alt="Logo"/>
            </a>
            <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
                 data-fire-event="sidebar-left-opened">
                <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
            </div>
        </div>

        <!-- start: search & user box -->
        <div class="header-right">
            <ul class="notifications">
                @if (isset($_COOKIE['cookieFile']))
                    @if (Crypt::decrypt($_COOKIE['cookieFile']))
                        <li>
                            <a href="{{ URL::to('/') }}/admin/quick-login/1" class="clearfix">Admin Page</a>
                        </li>
                    @endif
                @endif
                {{--*/ $emails = App\Classes\EmailClass::get_all_email(Auth::user()->id,"","","",5) /*--}}
                {{--*/ $email_count = App\Classes\EmailClass::get_email_count(Auth::user()->id, 0) /*--}}
                <li>
                    <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                        <i class="fa fa-envelope-o"></i>
                        @if($email_count>0)
                            <span class="badge">{{ $email_count }}</span>
                        @endif
                    </a>
                    <div class="dropdown-menu notification-menu">
                        <div class="notification-title">
                            <span class="pull-right label label-default">{{ $email_count }}</span>
                            {{trans('header.emails')}}
                        </div>
                        <div class="content">
                            <ul>
                                @if (!empty($emails))
                                    @if (count($emails))
                                        @foreach($emails as $email)
                                            @if ($email->status)
                                                {{--*/ $strong_start = "" /*--}}
                                                {{--*/ $strong_end = "" /*--}}
                                            @else
                                                {{--*/ $strong_start = "<strong>" /*--}}
                                                {{--*/ $strong_end = "</strong>" /*--}}
                                            @endif
                                            <li>
                                                <a href="{{ URL::route('emails') }}?view={{ Crypt::encrypt($email->id) }}"
                                                   class="clearfix">
                                                    <span class="title">{!! $strong_start !!}
                                                        BitRegion{!! $strong_end !!}</span>
                                                    <span class="message">{!! $strong_start !!}{{ $email->subject }}{!! $strong_end !!}</span>
                                                </a>
                                            </li>
                                        @endforeach
                                    @else
                                        <li>
                                            <a href="#" class="clearfix">
                                                <span class="message">{{trans('header.you_have_no_emails')}}</span>
                                            </a>
                                        </li>
                                    @endif
                                @endif
                            </ul>

                            <hr/>

                            <div class="text-right">
                                <a href="{{URL::route('emails')}}"
                                   class="view-more">{{trans('header.view_all_emails')}}</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle notification-icon" data-toggle="dropdown">
                        <i class="fa fa-list-alt"></i>
                        @if(Auth::user()->selfie_verify_status < 1 && Auth::user()->id_verify_status < 1)
                            <span class="badge">2</span>
                        @endif
                    </a>

                    <div class="dropdown-menu notification-menu">
                        <div class="notification-title">

                            {{trans('header.notifications')}}
                        </div>

                        <div class="content">
                            <ul>
                                @if(Auth::user()->id_verify_status < 1)
                                    <li>
                                        <a href="{{URL::route('verification')}}" class="clearfix">
                                            <span class="fa fa-exclamation-triangle pull-left fa-3x"></span>
                                            <span class="title">{{trans('header.pls_verify_your_identity')}}</span>
                                            <span class="message">{{trans('header.click_to_verify_now')}}</span>
                                        </a>
                                    </li>
                                @endif

                                @if(Auth::user()->selfie_verify_status < 1)
                                    <li>
                                        <a href="{{URL::route('verification')}}" class="clearfix">
                                            <span class="fa fa-exclamation-triangle pull-left fa-3x"></span>
                                            <span class="title">{{trans('header.pls_verify_photo')}}</span>
                                            <span class="message">{{trans('header.click_to_verify_photo')}}</span>
                                        </a>
                                    </li>
                                @endif

                                @if(Auth::user()->selfie_verify_status > 0 && Auth::user()->selfie_verify_status > 0)

                                    <li>
                                        {{trans('header.no_notification')}}
                                    </li>
                                @endif
                            </ul>

                        </div>
                    </div>
                </li>
            </ul>

            <span class="separator"></span>
            {{--*/ $passport_balance = Auth::user()->passport_balance /*--}}
            <a href="#" data-toggle="tooltip" data-placement="left"
               title="Soft Key" class="mb-xs mt-xs mr-xs btn btn-default">{{ $passport_balance }} <i
                        class="fa fa-key"></i></a>
            {{--*/ $shares_balance = number_format(\App\Classes\SharesClass::getSharesBalance(Auth::user()->id)['shares_balance'], 8) /*--}}
            <a href="#" data-toggle="tooltip" data-placement="right"
               title="Fixed Deposit" class="mb-xs mt-xs mr-xs btn btn-success"><i
                        class="fa fa-bitcoin"></i> {{ $shares_balance }} </a>
            <span class="separator"></span>
            <div id="userbox" class="userbox">
                <a href="#" data-toggle="dropdown">
                    <figure class="profile-picture">
                        <img src="@if(Auth::user()->profile_pic){{S3Files::url('profiles/'.Auth::user()->profile_pic)}} @else {{asset('profiles/no_img.jpg')}} @endif"
                             class="img-rounded"/>
                    </figure>
                    <div class="profile-info">
                        <span class="name">{{Auth::user()->alias}}</span>
                        <span class="role">{{ \App\Classes\UserClass::getUserClass(Auth::user()->id)['user_class_name'] }}</span>
                    </div>

                    <i class="fa custom-caret"></i>
                </a>

                <div class="dropdown-menu">
                    <ul class="list-unstyled">
                        <li class="divider"></li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="{{URL::route('personal-info')}}"><i
                                        class="fa fa-user"></i> {{trans('member.personal_info')}}</a>
                        </li>
                        @if(Auth::user()->selfie_verify_status < 1 && Auth::user()->id_verify_status < 1)
                            <li>
                                <a role="menuitem" tabindex="-1" href="{{URL::route('verification')}}"><i
                                            class="fa fa-check"></i> {{trans('member2.accountverifi')}}</a>
                            </li>
                        @endif
                        <li>
                            <a role="menuitem" tabindex="-1" href="{{URL::route('communication-info')}}"><i
                                        class="fa fa-mobile"></i> {{trans('member.communication_info')}}</a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="{{URL::route('social-media-info')}}"><i
                                        class="fa fa-share"></i> {{trans('member.social_media_info')}}</a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="{{URL::route('bitcoin-wallet')}}"><i
                                        class="fa fa-bitcoin"></i> {{trans('member.bitcoin_wallet')}}</a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="{{URL::route('referral-setting')}}"><i
                                        class="fa fa-sitemap"></i> {{trans('member.referral_setting')}}</a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="{{URL::route('change-password')}}"><i
                                        class="fa fa-unlock"></i> {{trans('member.change_password')}}</a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="{{URL::route('security')}}"><i
                                        class="fa fa-lock"></i> {{trans('member.security')}}</a>
                        </li>
                        <li>
                            <a role="menuitem" tabindex="-1" href="{{URL::route('logout')}}"><i
                                        class="fa fa-sign-out"></i> {{trans('member.logout')}}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end: search & user box -->
    </header>
    <!-- end: header -->

    <div class="inner-wrapper">
        <!-- start: sidebar -->
        <aside id="sidebar-left" class="sidebar-left">
            <div class="nano">
                <div class="nano-content">
                    @if(Auth::user()->user_type == '3')
                        @include('member.menu_unreg')
                    @else
                        @include('member.menu')
                    @endif
                </div>
            </div>

        </aside>
        <!-- end: sidebar -->

        <section role="main" class="content-body">

            <!-- start: page -->
