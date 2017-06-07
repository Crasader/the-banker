<li class="nav-parent @yield('kb-class')">
    <a>
        <i class="icons icon-support" aria-hidden="true"></i>
        <span>Support Ticket</span>
    </a>
    <ul class="nav nav-children">
        @if(Auth::user()->leader_at != '0000-00-00 00:00:00')
            <li class="@yield('kb-manage-art-class')">
                <a href="{{URL('/article')}}">
                    <i class="fa fa-edit" aria-hidden="true"></i> {{trans('knowledge.menu_4')}}
                </a>
            </li>
            <li class="@yield('kb-manage-cat-class')">
                <a href="{{URL('/category')}}">
                    <i class="fa fa-edit" aria-hidden="true"></i> {{trans('knowledge.menu_5')}}
                </a>
            </li>

            <li class="@yield('assigned-ticke-class')">
                <a href="{{URL::route('assigned.ticket',['Open'])}}">
                    <i class="fa fa-list-ul" aria-hidden="true"></i> {{trans('knowledge.menu_6')}}
                </a>
            </li>
        @endif
        <li class="@yield('ticket-create-class')">
            <a href="{{URL::route('create-ticket')}}">
                <i class="icons icon-arrow-right" aria-hidden="true"></i> Create Ticket
            </a>
        </li>
        <li class="@yield('my-ticke-class')">
            <a href="{{URL::route('my-tickets')}}">
                <i class="icons icon-arrow-right" aria-hidden="true"></i> Ticket Status
            </a>
        </li>
    </ul>
</li>