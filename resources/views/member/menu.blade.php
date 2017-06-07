<nav id="menu" class="nav-main sidebar-light" role="navigation">
    <ul class="nav nav-main">


        <li class="@yield('home-class')">
            <a href="{{URL::route('home')."?xtoken=".md5(rand(1000,9999))}}">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span>Dashboard</span>
            </a>
        </li>
        
        {{--*/ $hasTranslationReq = App\Model\LanguageTranslation::hasRecords(['user_id'=>Auth::user()->id,'status'=>[0,1]]) /*--}}
                   @if($hasTranslationReq)
                   <li class="@yield('lang-class')">
                        <a href="{{URL::route('member-lang-trans-req')."?xtoken=".md5(rand(1000,9999))}}">
                            <i class="fa fa-language site-menu-icon"></i>
                            <span class="site-menu-title">{{trans('member.menu_lang_trans_request')}}</span>
                        </a>
                    </li>
                   @endif

        <li class="@yield('passport-class')">
            <a href="{{URL::route('passport')."?xtoken=".md5(rand(1000,9999))}}">
                <i class="icons icon-key" aria-hidden="true"></i>
                <span>Buy SoftKey</span>
            </a>
        </li>

        <li class="nav-parent @yield('pagb-class')">
            <a>
                <i class="fa fa-sitemap" aria-hidden="true"></i>
                <span>{{trans('member.agb')}}</span>
            </a>
            <ul class="nav nav-children">
                <li class="@yield('assistance-dashboard-class')">
                    <a href="{{URL::route('assistant')."?xtoken=".md5(rand(1000,9999))}}">
                        {{trans('member.dashboard')}}
                    </a>
                </li>
                <li class="@yield('assistance-history-class')">
                    <a href="{{URL::route('pagb-history')."?xtoken=".md5(rand(1000,9999))}}">
                        {{trans('member.history')}}
                    </a>
                </li>
            </ul>
        </li>

        <li id="mainnewphplus" class="nav-parent @yield('bank-class')">
            <a>
                <i class="fa fa-bank" aria-hidden="true"></i>
                <span>{{trans('member.region_bank')}}</span>&nbsp;&nbsp;
                <!--
                <span class="label label-primary mainnew">1 NEW</span>&nbsp;&nbsp;
                <span class="label label-primary mainnew">1 UPDATE</span>
                -->
            </a>
            <ul class="nav nav-children">
                <li class="@yield('ph-class')">
                    <a href="{{URL::route('provide-help')."?xtoken=".md5(rand(1000,9999))}}">
                        {{trans('member.ph')}}
                    </a>
                </li>
                @if (!empty(count(\App\Classes\PHGHClass::getPHAll(Auth::user()->id, "5", "<=", "plus"))))
                <li class="@yield('php-class')">
                    <a href="{{URL::route('ph-plus')."?xtoken=".md5(rand(1000,9999))}}">
                        {{trans('ph.xsPH')}} + (Plus) &nbsp;
                        <!--
                        <span class="label label-primary subnew">NEW</span>
                        -->
                    </a>
                </li>
                @endif
                <li class="@yield('gh-class')">
                    <a href="{{URL::route('get-help')."?xtoken=".md5(rand(1000,9999))}}">
                        {{trans('gh.gh')}}
                    </a>
                </li>
                <li class="@yield('pairing-class')">
                    <a href="{{URL::route('pairing')."?xtoken=".md5(rand(1000,9999))}}">
                        {{trans('pairing.flex_pairing')}} &nbsp;
                        <!--
                        <span class="label label-primary">UPDATE</span>
                        -->
                    </a>
                </li>
            </ul>
        </li>

        <li class="@yield('shares-class')">
            <a href="{{URL::route('shares')."?xtoken=".md5(rand(1000,9999))}}">
                <i class="" aria-hidden="true"><img src="{{asset('assets/images/brwallet_ico.png')}}" width="20"/></i>
                <span>{{trans('member.br_share')}}</span>
            </a>
        </li>

        <div class="sidebar-widget widget-tasks" style="margin-top:20px;">
            <div class="widget-header">
                <h6>{{trans('member2.micro_bank')}}</h6>
            </div>
        </div>

        <li class="@yield('micro-passport-class')">
            <a href="{{URL::route('micro-passport')."?xtoken=".md5(rand(1000,9999))}}">
                <i class="" aria-hidden="true"><img src="{{asset('assets/images/passport_ico.png')}}" width="20"/></i>
                <span>{{trans('member2.purchase_micro_passport')}}</span> &nbsp;
                <!--
                <span class="label label-primary">{{trans('member2.new')}}</span>
                -->
            </a>
        </li>

        <li id="mainnewmicro" class="nav-parent @yield('micro-bank-class')">
            <a>
                <i class="fa fa-bank" aria-hidden="true"></i>
                <span>{{trans('member2.micro_bank')}}</span>&nbsp;&nbsp;
                <!--
                <span class="label label-primary mainnew">2 NEW</span>
                -->
            </a>
            <ul class="nav nav-children">
                <li class="@yield('micro-ph-class')">
                    <a href="{{URL::route('micro-provide-help')."?xtoken=".md5(rand(1000,9999))}}">
                        {{trans('member2.micro_ph')}} &nbsp;
                        <!--
                        <span class="label label-primary">{{trans('member2.new')}}</span>
                        -->
                    </a>
                </li>
                <li class="@yield('micro-gh-class')">
                    <a href="{{URL::route('micro-get-help')."?xtoken=".md5(rand(1000,9999))}}">
                        {{trans('member2.micro_gh')}} &nbsp;
                        <!--
                        <span class="label label-primary">{{trans('member2.new')}}</span>
                        -->
                    </a>
                </li>
            </ul>
        </li>

        <li class="@yield('micro-shares-class')">
            <a href="{{URL::route('micro-shares')."?xtoken=".md5(rand(1000,9999))}}">
                <i class="" aria-hidden="true"><img src="{{asset('assets/images/brwallet_ico.png')}}" width="20"/></i>
                <span>{{trans('member2.micro_share')}}</span> &nbsp;
                <!--
                <span class="label label-primary">{{trans('member2.new')}}</span>
                -->
            </a>
        </li>

        <div class="sidebar-widget widget-tasks" style="margin-top:20px;">
            <div class="widget-header">
                <h6>{{trans('member2.network_services')}}</h6>
            </div>
        </div>

        <li class="nav-parent @yield('hierarchy-class')">
            <a>
                <i class="fa fa-sitemap" aria-hidden="true"></i>
                <span>{{trans('member.hierarchy')}}</span>
            </a>
            <ul class="nav nav-children">
                <li class="@yield('nh-class')">
                    <a href="{{URL::route('hierarchy')."?xtoken=".md5(rand(1000,9999))}}">
                        {{trans('member.network_hierarchy')}}
                    </a>
                </li>
                <li class="@yield('rh-class')">
                    <a href="{{URL::route('referral')."?xtoken=".md5(rand(1000,9999))}}">
                        {{trans('member.referral_hierarchy')}}
                    </a>
                </li>
            </ul>
        </li>

        <li class="@yield('newmember-class')">
            <a href="{{URL::route('new-member')."?xtoken=".md5(rand(1000,9999))}}">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                <span>{{trans('member.register_new_member')}}</span>
            </a>
        </li>
        <li class="@yield('network-class')">
            <a href="{{URL::route('network')."?xtoken=".md5(rand(1000,9999))}}">
                <i class="fa fa-briefcase" aria-hidden="true"></i>
                <span>{{trans('member.network_list')}}</span>
            </a>
        </li>
        <li class="@yield('faq-class')" style="display: none;">
            <a href="{{URL::route('faq')."?xtoken=".md5(rand(1000,9999))}}">
                <i class="fa fa-question-circle" aria-hidden="true"></i>
                <span>{{trans('member.faq')}}</span>
            </a>
        </li>
        <li>
            <a href="{{URL::route('logout')."?xtoken=".md5(rand(1000,9999))}}">
                <i class="icons icon-power" aria-hidden="true"></i>
                <span>Log Out</span>
            </a>
        </li>

    </ul>
</nav>

<script type="text/javascript">
    $('#mainnewphplus').click(function(){
        $('.mainnew').css("display", "none");
    })

    if ( $('#mainnewphplus').hasClass( "nav-expanded" ) ) {
        $('.mainnew').css("display", "none");
    }
    $('#mainnewmicro').click(function(){
        $('.mainnew').css("display", "none");
    })

    if ( $('#mainnewmicro').hasClass( "nav-expanded" ) ) {
        $('.mainnew').css("display", "none");
    }
</script>