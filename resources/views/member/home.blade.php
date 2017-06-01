@extends('member.default')

@section('title'){{trans('member.home')}} @Stop
@section('home-class')nav-active @Stop

@section('menu_setting') @Stop

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if($user_details['user_type'] == '3')
        <div class="col-lg-12" data-appear-animation="fadeInUp" style="z-index:6; position:relative;">
            <div class="row">
            <section class="panel panel-featured panel-featured-success">
                <header class="panel-heading">
                    <div class="panel-actions">
                        <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                    </div>
                    <span class="fa fa-check text-success fa-3x pull-left"></span>
                    <h2 class="panel-title">{{trans('home.welcome')}}</h2>
                    <p class="panel-subtitle"><strong>{{trans('home.pls_upgrade_to_become_member')}}</strong></p>
                </header>
                <div class="panel-body">
                    <!--
                    <p>Is this your correct referrer? <strong>"{{$upline_details['alias']}}"</strong>. If not, please send us <a href="{{URL::route('create-ticket')}}">a ticket</a> to change your referrer.</p>
                    -->
                    <p>Is this your correct referrer? <strong>"{{$upline_details['alias']}}"</strong>. If not, please <a href="#UpdateReferrer" class="btn btn-warning btn-xs modal-referrer update_referrer" style="color:#FFF;" data-id=""  data-value="">Click Here</a> to change your referrer.</p>
                    <div class="alert alert-success" data-appear-animation="fadeInUp"><strong>{{trans('home.received_one_passport')}}</strong></div>
                    <p><strong>{!! trans('home.receive_one_passport_info') !!}</strong></p>

                    <a href="{{URL::route('assistant')}}" class="btn btn-success pull-right"><span class="glyphicon glyphicon-circle-arrow-right"></span> {{trans('home.provide_asssistance_now')}}</a>
                </div>
            </section>
                </div>
        </div>
    @endif

@if($news)
<div class="col-md-12">
    <div class="row">
        <section class="panel panel-danger">
            <header class="panel-heading">
                <div class="panel-actions">
                    <a href="#" class="panel-action panel-action-toggle" data-panel-toggle></a>
                    <a href="#" class="panel-action panel-action-dismiss" data-panel-dismiss></a>
                </div>

                <h2 class="panel-title"><span class="fa fa-bullhorn"></span>&nbsp; &nbsp; {{$news->title}}</h2>
                <p class="panel-subtitle">{{date('F d, Y h:mA', strtotime($news->created_at))}}</p>
            </header>
            <div class="panel-body">
                {!!nl2br($news->news)!!}
                <br><br><a href="{{URL::route('news')}}" class="text-danger">Read More News</a>
            </div>
        </section>
    </div>
</div>
@endif

    <div class="row">

<div class="col-lg-6">

    @if ($user_details['user_class'] < 6)
    @if ($user_details['upline_diff_class'] >= 2)
    <section class="panel panel-featured panel-featured-danger">
        <header class="panel-heading">
            <h2 class="panel-title"><span class="fa fa-warning text-danger"></span> {{trans('home.dont_miss_gb')}}</h2>
        </header>
        <div class="panel-body">
            <p><strong>{{trans('home.your_upline_is_now')}} {{ $user_details['upline_diff_class'] }} {{trans('home.class_above')}}</strong></p>

            <a href="{{URL::route('assistant')}}" class="btn btn-danger pull-right"><span class="glyphicon glyphicon-circle-arrow-right"></span> {{trans('home.upgrade_now')}}</a>
        </div>
    </section>
    @endif
    @endif

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="chart chart-sm" id="flotWidgetsSales1"></div>
            <script>

                var flotWidgetsSales1Data = [{
                    data: [
                        @if (!empty($charts))
                        @foreach($charts as $chart)
                        ["{{ $chart['key'] }}", {{ $chart['value'] }}],
                        @endforeach
                        @endif
                    ],
                    color: "#e2a129"
                }];

            </script>
            <hr class="solid short mt-lg">
            <div class="row">
                <div class="col-md-4">
                    <div class="h4 text-weight-bold mb-none mt-lg"><span class="fa fa-bitcoin"></span>{{ $total_pagb['send'] }}</div>
                    <p class="text-xs text-muted mb-none">{{ trans('home.assistance_given') }}</p>
                </div>
                <div class="col-md-4">
                    <div class="h4 text-weight-bold mb-none mt-lg"><span class="fa fa-bitcoin"></span>{{ $total_pagb['received'] }}</div>
                    <p class="text-xs text-muted mb-none">{{ trans('home.assistance_received') }}</p>
                </div>
                <div class="col-md-4">
                    <div class="h4 text-weight-bold mb-none mt-lg">{{ $total_pagb['members'] }}</div>
                    <p class="text-xs text-muted mb-none">{{ trans('home.members') }}</p>
                </div>
            </div>
        </div>
    </div>



    <div class="panel panel-default">
        <header class="panel-heading bg-primary">

            <div class="widget-profile-info">
                <div class="profile-picture">
                    <img src="{{asset('assets/images/class/'.$user_details['user_class'].'.png')}}" style="background-color:#FFF;">
                </div>
                <div class="profile-info">
                    <h4 class="name text-weight-semibold">{{$user_details['alias']}}</h4>
                    <h5 class="role">{{ $user_details['class_name'] }}</h5>
                    <div class="profile-footer">
                        @if ($new_class_details)<span class="blink">
                        <a href="{{URL::route('assistant')}}" class="text-default" style="font-size:20px!important;opacity:1!important">{{ trans('home.upgrade_to') }} {{ $new_class_details['class_name'] }}</a></span>
                        @else
                        &nbsp;
                        @endif
                    </div>
                </div>
            </div>

        </header>
        <div id="dada" class="panel-body">
            <table class="table mb-none">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{ trans('home.class') }}</th>
                    <th style="text-align:center;">{{ trans('home.member_slot') }}</th>
                    <th style="text-align:right;">{{ trans('home.potential') }} <span class="fa fa-bitcoin"></span></th>
                </tr>
                </thead>
                <tbody>
                <tr class="{{ $user_details['primary1'] }} moreinfo" data-toggle="collapse" data-target=".class1" data-parent="#dada">
                    <td><span class="fa fa-plus-square-o"></span></td>
                    <td>Immigrant</td>
                    <td align="center">0/3</td>
                    <td align="right">0.45</td>
                </tr>
                <tr class="class1 collapse">
                    <td colspan="5">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-8">
                                    <p>{{ trans('home.bonus_entitlement') }}</p>
                                    <img data-toggle="tooltip" data-placement="top" title="Provide Assistance" src="{{asset('assets/images/badges/BLACK-ASIISTANCE.png')}}" width="50"/>
                                    <img data-toggle="tooltip" data-placement="top" title="Region Bank"  src="{{asset('assets/images/badges/BLACK-REGION-BANK.png')}}" width="50"/>
                                    <img data-toggle="tooltip" data-placement="top" title="Passport Referral" src="{{asset('assets/images/badges/BLACK-PASPORT-10.png')}}" width="50"/>
                                    <img data-toggle="tooltip" data-placement="top" title="PH Referral" src="{{asset('assets/images/badges/NEW-BLACK-DIVIDEND-10.png')}}" width="50"/>
                                </div>
                                <div class="col-lg-4">
                                    <div class="pull-right" style="height:80px; overflow:hidden; width:95px;">
                                        <img src="{{asset('assets/images/class/1.png')}}" width="120" style="margin-top:-20px;"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="{{ $user_details['primary2'] }} moreinfo" data-toggle="collapse" data-target=".class2" data-parent="#dada">
                    <td><span class="fa fa-plus-square-o"></span></td>
                    <td>Visa Holder</td>
                    <td align="center">0/9</td>
                    <td align="right">4.05</td>
                </tr>
                <tr class="class2 collapse">
                    <td colspan="5">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-8">
                                    <p>{{ trans('home.bonus_entitlement') }}</p>
                                    <img data-toggle="tooltip" data-placement="top" title="Passport Referral" src="{{asset('assets/images/badges/BLACK-PASPORT-5.png')}}" width="50"/>
                                </div>
                                <div class="col-lg-4">
                                    <div class="pull-right" style="height:80px; overflow:hidden; width:95px;">
                                        <img src="{{asset('assets/images/class/2.png')}}" width="120" style="margin-top:-20px;"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="{{ $user_details['primary3'] }} moreinfo" data-toggle="collapse" data-target=".class3" data-parent="#dada">
                    <td><span class="fa fa-plus-square-o"></span></td>
                    <td>Permanent Resident</td>
                    <td align="center">0/27</td>
                    <td align="right">12.15</td>
                </tr>
                <tr class="class3 collapse">
                    <td colspan="5">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-8">
                                    <p>{{ trans('home.bonus_entitlement') }}</p>
                                    <img data-toggle="tooltip" data-placement="top" title="Receive Give Back" src="{{asset('assets/images/badges/BLACK-GIVE-BACK.png')}}" width="50"/>
                                    <img data-toggle="tooltip" data-placement="top" title="Passport Referral" src="{{asset('assets/images/badges/BLACK-PASPORT-3.png')}}" width="50"/>
                                    <img data-toggle="tooltip" data-placement="top" title="Pairing Bonus" src="{{asset('assets/images/badges/BLACK-FLEX-PAIRING-0.5.png')}}" width="50"/>
                                </div>
                                <div class="col-lg-4">
                                    <div class="pull-right" style="height:80px; overflow:hidden; width:95px;">
                                        <img src="{{asset('assets/images/class/3.png')}}" width="120" style="margin-top:-20px;"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="{{ $user_details['primary4'] }} moreinfo" data-toggle="collapse" data-target=".class4" data-parent="#dada">
                    <td><span class="fa fa-plus-square-o"></span></td>
                    <td>Citizen</td>
                    <td align="center">0/81</td>
                    <td align="right">72.90</td>
                </tr>
                <tr class="class4 collapse">
                    <td colspan="5">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-8">
                                    <p>{{ trans('home.bonus_entitlement') }}</p>
                                    <img data-toggle="tooltip" data-placement="top" title="Passport Referral" src="{{asset('assets/images/badges/BLACK-PASPORT-1.png')}}" width="50"/>
                                    <img data-toggle="tooltip" data-placement="top" title="PH Referral" src="{{asset('assets/images/badges/NEW-BLACK-DIVIDEND-5.png')}}" width="50"/>
                                    <img data-toggle="tooltip" data-placement="top" title="Pairing Bonus" src="{{asset('assets/images/badges/BLACK-FLEX-PAIRING-1.png')}}" width="50"/>
                                </div>
                                <div class="col-lg-4">
                                    <div class="pull-right" style="height:80px; overflow:hidden; width:95px;">
                                        <img src="{{asset('assets/images/class/4.png')}}" width="120" style="margin-top:-20px;"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="{{ $user_details['primary5'] }} moreinfo" data-toggle="collapse" data-target=".class5" data-parent="#dada">
                    <td><span class="fa fa-plus-square-o"></span></td>
                    <td>Ambassador</td>
                    <td align="center">0/243</td>
                    <td align="right">291.60</td>
                </tr>
                <tr class="class5 collapse">
                    <td colspan="5">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-8">
                                    <p>{{ trans('home.bonus_entitlement') }}</p>
                                    <img data-toggle="tooltip" data-placement="top" title="Passport Referral" src="{{asset('assets/images/badges/BLACK-PASPORT-0.5.png')}}" width="50"/>
                                    <img data-toggle="tooltip" data-placement="top" title="PH Referral" src="{{asset('assets/images/badges/NEW-BLACK-DIVIDEND-3.png')}}" width="50"/>
                                    <img data-toggle="tooltip" data-placement="top" title="Pairing Bonus" src="{{asset('assets/images/badges/BLACK-FLEX-PAIRING-3.png')}}" width="50"/>
                                </div>
                                <div class="col-lg-4">
                                    <div class="pull-right" style="height:80px; overflow:hidden; width:95px;">
                                        <img src="{{asset('assets/images/class/5.png')}}" width="120" style="margin-top:-20px;"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="{{ $user_details['primary6'] }} moreinfo" data-toggle="collapse" data-target=".class6" data-parent="#dada">
                    <td><span class="fa fa-plus-square-o"></span></td>
                    <td>Senator</td>
                    <td align="center">0/729</td>
                    <td align="right">1,530.90</td>
                </tr>
                <tr class="class6 collapse">
                    <td colspan="5">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-8">
                                    <p>{{ trans('home.bonus_entitlement') }}</p>
                                    <img data-toggle="tooltip" data-placement="top" title="Passport Referral" src="{{asset('assets/images/badges/BLACK-PASPORT-0.1.png')}}" width="50"/>
                                    <img data-toggle="tooltip" data-placement="top" title="PH Referral" src="{{asset('assets/images/badges/NEW-BLACK-DIVIDEND-1.png')}}" width="50"/>
                                    <img data-toggle="tooltip" data-placement="top" title="Pairing Bonus" src="{{asset('assets/images/badges/BLACK-FLEX-PAIRING-5.png')}}" width="50"/>
                                </div>
                                <div class="col-lg-4">
                                    <div class="pull-right" style="height:80px; overflow:hidden; width:95px;">
                                        <img src="{{asset('assets/images/class/6.png')}}" width="120" style="margin-top:-20px;"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr class="{{ $user_details['primary7'] }} moreinfo" data-toggle="collapse" data-target=".class7" data-parent="#dada">
                    <td><span class="fa fa-plus-square-o"></span></td>
                    <td>Vice President</td>
                    <td align="center">0/2187</td>
                    <td align="right">6,561.00</td>
                </tr>
                <tr class="class7 collapse">
                    <td colspan="5">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-8">
                                    <p>{{ trans('home.bonus_entitlement') }}</p>
                                    <img data-toggle="tooltip" data-placement="top" title="Passport Referral" src="{{asset('assets/images/badges/BLACK-PASPORT-0.05.png')}}" width="50"/>
                                    <img data-toggle="tooltip" data-placement="top" title="PH Referral" src="{{asset('assets/images/badges/NEW-BLACK-DIVIDEND-0.5.png')}}" width="50"/>
                                    <img data-toggle="tooltip" data-placement="top" title="Pairing Bonus" src="{{asset('assets/images/badges/BLACK-FLEX-PAIRING-7.png')}}" width="50"/>
                                </div>
                                <div class="col-lg-4">
                                    <div class="pull-right" style="height:80px; overflow:hidden; width:95px;">
                                        <img src="{{asset('assets/images/class/7.png')}}" width="120" style="margin-top:-20px;"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <tr class="{{ $user_details['primary8'] }} moreinfo" data-toggle="collapse" data-target=".class8" data-parent="#dada">
                    <td><span class="fa fa-plus-square-o"></span></td>
                    <td>President</td>
                    <td align="center">0/6561</td>
                    <td align="right">29,524.50</td>
                </tr>
                <tr class="class8 collapse">
                    <td colspan="5">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-8">
                                    <p>{{ trans('home.bonus_entitlement') }}</p>
                                    <img data-toggle="tooltip" data-placement="top" title="Passport Referral" src="{{asset('assets/images/badges/BLACK-PASPORT-0.01.png')}}" width="50"/>
                                    <img data-toggle="tooltip" data-placement="top" title="PH Referral" src="{{asset('assets/images/badges/NEW-BLACK-DIVIDEND-0.1.png')}}" width="50"/>
                                    <img data-toggle="tooltip" data-placement="top" title="Pairing Bonus" src="{{asset('assets/images/badges/BLACK-FLEX-PAIRING-10.png')}}" width="50"/>
                                </div>
                                <div class="col-lg-4">
                                    <div class="pull-right" style="height:80px; overflow:hidden; width:95px;">
                                        <img src="{{asset('assets/images/class/8.png')}}" width="120" style="margin-top:-20px;"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="col-lg-6">

    <div class="row">

    <div class="col-md-12 col-xl-12">
        <section class="panel">
            <div class="panel-body bg-primary">
                <div class="widget-summary widget-summary-md">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon" style="width:110px; height:110px; border-radius:110px; padding-top:18px; margin-top:18px;">
                            <i class="fa fa-line-chart fa-2x"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">{{ trans('home.total_ph') }}</h4>
                            <div class="info">
                                <strong class="amount">{{ $total_active_dividen['total_active_ph'] }}</strong>
                            </div>
                        </div>
                        <hr>
                        <div class="summary">
                            <h4 class="title">{{ trans('home.dividend') }}</h4>
                            <div class="info">
                                <strong class="amount" id="profit_bonus">{{ $total_active_dividen['balance_active_dividen'] }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="col-md-12 col-xl-12">
        <section class="panel">
            <div class="panel-body panel-featured-top panel-featured-primary">
                <div class="widget-summary widget-summary-md">
                    <div class="widget-summary-col widget-summary-col-icon">
                        <div class="summary-icon bg-primary" style="width:110px; height:110px; border-radius:110px; padding-top:18px; margin-top:18px;">
                            <i class="fa fa-sitemap fa-2x"></i>
                        </div>
                    </div>
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">{{ trans('pairing.current_pairing') }}</h4>
                            <div class="info">
                                <strong class="amount">0</strong>
                            </div>
                        </div>
                        <hr>
                        <div class="summary">
                            <h4 class="title">{{ trans('pairing.next_pair_in') }}</h4>
                            <div class="info">
                                <strong class="amount"><span id="ms_timer"></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    </div>

    <div class="row">
    <div class="col-md-4 ">
        <section class="panel">
            <div class="panel-body panel-featured-left panel-featured-primary" style="background-color:#bababa;">
                <div class="widget-summary widget-summary-sm">
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">{{ trans('brshare.pr') }}</h4>
                            <div class="info">
                                <strong class="amount">{{ number_format($shares_balance_type['PR']['shares_balance'],8) }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-4 ">
        <section class="panel">
            <div class="panel-body panel-featured-left panel-featured-primary"  style="background-color:#CCCCCC;">
                <div class="widget-summary widget-summary-sm">

                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">{{ trans('brshare.po') }}</h4>
                            <div class="info">
                                <strong class="amount">{{ number_format($shares_balance_type['PO']['shares_balance'],8) }}</strong>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-4 ">
        <section class="panel">
            <div class="panel-body panel-featured-left panel-featured-primary" style="background-color:#bababa;">
                <div class="widget-summary widget-summary-sm">
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">{{ trans('brshare.phc') }}</h4>
                            <div class="info">
                                <strong class="amount">{{ number_format($shares_balance_type['PHC']['shares_balance'],8) }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    </div>

    <div class="row">

    <div class="col-md-4 ">
        <section class="panel">
            <div class="panel-body panel-featured-left panel-featured-primary" style="background-color:#bababa;">
                <div class="widget-summary widget-summary-sm">
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">{{trans('brshare.phd')}}</h4>
                            <div class="info">
                                <strong class="amount">{{ number_format($shares_balance_type['PHD']['shares_balance'],8) }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="panel">
            <div class="panel-body panel-featured-left panel-featured-primary" style="background-color:#bababa;">
                <div class="widget-summary widget-summary-sm">
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">{{ trans('brshare.phr') }}</h4>
                            <div class="info">
                                <strong class="amount">{{ number_format($shares_balance_type['PHR']['shares_balance'],8) }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="panel">
            <div class="panel-body panel-featured-left panel-featured-primary" style="background-color:#CCCCCC;">
                <div class="widget-summary widget-summary-sm">
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">{{ trans('brshare.pho') }}</h4>
                            <div class="info">
                                <strong class="amount">{{ number_format($shares_balance_type['PHO']['shares_balance'],8) }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="panel">
            <div class="panel-body panel-featured-left panel-featured-primary" style="background-color:#CCCCCC;">
                <div class="widget-summary widget-summary-sm">
                    <div class="widget-summary-col">
                        <div class="summary">
                            <h4 class="title">{{ trans('brshare.fp') }}</h4>
                            <div class="info">
                                <strong class="amount">{{ number_format($shares_balance_type['FP']['shares_balance'],8) }}</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <div class="col-md-8 ">
    <div class="panel panel-featured panel-featured-primary">
        <div class="panel-heading" style="text-align:center;">
            <span class="text-primary">{{ trans('home.br_shares') }}</span>
        </div>
        <div class="panel-body">
            <div class="chart chart-md" id="morrisDonut"></div>

        </div>

    </div>
    </div>

    </div>

    <div class="row" style="display:none;">

        <div class="col-md-12">
            <section class="panel">
                <div class="panel-body bg-dark">
                    <div class="widget-summary">
                        <div class="widget-summary-col widget-summary-col-icon">
                            <div class="summary-icon bg-primary">
                                <i class="fa fa-life-ring"></i>
                            </div>
                        </div>
                        <div class="widget-summary-col">
                            <div class="summary">
                                <h4 class="title">{{ trans('home.available_br_Shares') }}</h4>
                                <div class="info">
                                    <strong class="amount">{{ number_format($shares_balance['shares_balance'],8) }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        @if($user_details['user_type'] == '3')
            <div class="modal-block modal-block-primary mfp-hide" id="UpdateReferrer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <form>

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Update Referrer</h4>
                            </div>

                            <div class="modal-body">

                                <div>You are about to update your referrer.<br><br></div>

                                <div class="form-horizontal form-bordered">


                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><strong>Referrer</strong></label>
                                        <div class="col-md-6">
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

                                    <br>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default modal-dismiss">Cancel</button>
                                <a href="#" class="btn btn-primary" id="referrer_link" disabled>Update Referrer</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>

</div>


<script type="text/javascript">
    var total_active_dividen = {{ $total_active_dividen['balance_active_dividen'] }};
    var timercount = 20;

    var plot = $.plot('#flotWidgetsSales1', flotWidgetsSales1Data, {
        series: {
            lines: {
                show: true,
                lineWidth: 2,
            },
            points: {
                show: true
            },
            shadowSize: 0
        },
        grid: {
            hoverable: true,
            clickable: true,
            borderColor: 'transparent',
            borderWidth: 1,
            labelMargin: 15,
            backgroundColor: 'transparent'
        },
        yaxis: {
            min: 0,
            color: 'transparent'
        },
        xaxis: {
            mode: 'categories',
            color: 'transparent'
        },
        legend: {
            show: false
        },
        tooltip: true,
        tooltipOpts: {
            content: '%x: %y',
            shifts: {
                x: -30,
                y: 25
            },
            defaultTheme: false
        }
    });

    @if (count($shares_balance['shares_balance']) == 0 || $shares_balance['shares_balance'] == 0)
    var morrisDonutData = [
        {
            label: "No shares available",
            value: 0
        }
    ];
    @else
    var morrisDonutData = [
        {
            label: "{{ trans('brshare.phc') }}",
            value: {{ $shares_balance_type['PHC']['shares_balance'] }}
        },
        {
            label: "{{ trans('brshare.phd') }}",
            value: {{ $shares_balance_type['PHD']['shares_balance'] }}
        },
        {
            label: "{{ trans('brshare.pr') }}",
            value: {{ $shares_balance_type['PR']['shares_balance'] }}
        },
        {
            label: "{{ trans('brshare.po') }}",
            value: {{ $shares_balance_type['PO']['shares_balance'] }}
        },
        {
            label: "{{ trans('brshare.phr') }}",
            value: {{ $shares_balance_type['PHR']['shares_balance'] }}
        },
        {
            label: "{{ trans('brshare.pho') }}",
            value: {{ $shares_balance_type['PHO']['shares_balance'] }}
        },
        {
            label: "{{ trans('brshare.fp') }}",
            value: {{ $shares_balance_type['FP']['shares_balance'] }}
        }
    ];

    @endif

    Morris.Donut({
                resize: true,
                element: 'morrisDonut',
                data: morrisDonutData,
                colors: ['#e2a129', '#333333', '#666666']
            });




    $('.moreinfo').click(function() {
        $('span',this).toggleClass("fa-minus-square-o fa-plus-square-o");
    });

    $(function(){
        setInterval(oneSecondFunction, 100);
    });

    function oneSecondFunction() {
        timercount++;
        var satoshi = 100000000;
        var value = total_active_dividen;
        var addvaluesatoshi = ({{ ($total_active_dividen['total_second_dividen_satoshi'] / 10) }} * timercount);
        var addvalue = (addvaluesatoshi / satoshi)
        var newvalue = parseFloat(value)+addvalue;
        $("#profit_bonus").html(newvalue.toFixed(8));
    }

    @if($user_details['user_type'] == '3')
    $('#darkoverlay').show();
    @endif

    $(function(){
                $("#ms_timer").countdowntimer({
                    startDate : "{{ Carbon\Carbon::now() }}",
                    dateAndTime : "{{ Carbon\Carbon::now()->endOfMonth() }}",
                    size : "xs",
                    borderColor : "transparent",
                    backgroundColor : "transparent",
                    fontColor : "#000",
                    regexpMatchFormat: "([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})",
                    regexpReplaceWith: "$1 days, $2 hours, $3 minutes, $4 seconds."
                });
            });

    function blinker() {
    	$('.blink').fadeOut(500);
    	$('.blink').fadeIn(500);
    }
    setInterval(blinker, 1000);

    $('.modal-referrer').magnificPopup({
        type: 'inline',
        preloader: false,
        focus: '#name',
        modal: true,

        // When elemened is focused, some mobile browsers in some cases zoom in
        // It looks not nice, so we disable it:
        callbacks: {
            beforeOpen: function() {
                if($(window).width() < 700) {
                    this.st.focus = false;
                } else {
                    this.st.focus = '#name';
                }
            }
        }
    });

    $(document).on('click', '.modal-dismiss', function (e) {
        e.preventDefault();
        $.magnificPopup.close();
        clearInterval(myTimer);
        clearInterval(window['timer_MSms_timer']);
        window = [];
    });

    $(document).on('click', '.close', function (e) {
        e.preventDefault();
        $.magnificPopup.close();
        clearInterval(myTimer);
        clearInterval(window['timer_MSms_timer']);
        window = [];
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
                    $('#referrer_link').attr('href', '{{ URL::to('/') }}/members/update-referrer/' + alias);
                    $('#referrer_link').attr('disabled',false);
                } else {
                    $('#usericon').html('<i class="fa fa-remove text-danger"></i>');
                    $('#referrer_link').attr('href', '#');
                    $('#referrer_link').attr('disabled',true);
                }
            }
        });
    }
</script>

@Stop