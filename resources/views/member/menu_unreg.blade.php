<nav id="menu" class="nav-main" role="navigation">
    <ul class="nav nav-main">
        <li class="@yield('home-class')">
            <a href="{{URL::route('home')}}">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="@yield('passport-class')">
            <a href="{{URL::route('passport')}}">
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
                    <a href="{{URL::route('assistant')}}">
                        {{trans('member.dashboard')}}
                    </a>
                </li>
                <li class="@yield('assistance-history-class')">
                    <a href="{{URL::route('pagb-history')}}">
                        {{trans('member.history')}}
                    </a>
                </li>
            </ul>
        </li>

        <li class="disabled">
            <a>
                <i class="fa fa-bank" aria-hidden="true"></i>
                <span>{{trans('member.region_bank')}}</span>
            </a>
        </li>

        <li class="disabled">
            <a href="#">
                <i class="" aria-hidden="true"><img src="{{asset('assets/images/brwallet_ico.png')}}" width="20" style="opacity:0.6;"/></i>
                <span>{{trans('member.br_share')}}</span>
            </a>
        </li>

        <li class="disabled">
            <a>
                <i class="fa fa-sitemap" aria-hidden="true"></i>
                <span>{{trans('member.hierarchy')}}</span>
            </a>
        </li>

        <li class="disabled">
            <a href="#">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
                <span>{{trans('member.register_new_member')}}</span>
            </a>
        </li>

        <li class="disabled">
            <a href="#">
                <i class="fa fa-th-list" aria-hidden="true"></i>
                <span>{{trans('member.network_list')}}</span>
            </a>
        </li>
        <li>
            <a href="{{URL::route('logout')}}">
                <i class="icons icon-power" aria-hidden="true"></i>
                <span>Logout</span>
            </a>
        </li>

    </ul>
</nav>