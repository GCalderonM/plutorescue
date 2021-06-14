<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <a href="{{url('/')}}" class="flex text-2xl text-white mx-auto c-sidebar-brand-full">
            <span>pluto<span class="text-yellow-500">rescue</span></span>
        </a>
        <a href="{{url('/')}}" class="flex text-2xl text-white mx-auto c-sidebar-brand-minimized">
            <img width="30px" src="{{ asset('images/brand_logo.svg') }}">
        </a>
    </div>
    <ul class="c-sidebar-nav">
        @role('Admin')
        <li class="c-sidebar-nav-title">{{__('global.admin')}}</li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{route('dashboard.index')}}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-home') }}"></use>
                </svg>
                Dashboard
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('users.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                </svg>
                {{ __('global.users') }}
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('announces.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-clipboard') }}"></use>
                </svg>
                {{__('global.announces')}}
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('accessLog.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-contact') }}"></use>
                </svg>
                {{__('global.accessLog')}}
            </a>
        </li>
        @endrole
        <li class="c-sidebar-nav-title">{{__('global.my-space')}}</li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('profile.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-face') }}"></use>
                </svg>
                {{__('global.profile')}}
            </a>
        </li>
        @role('Usuario')
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('my-announces.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-clipboard') }}"></use>
                </svg>
                {{__('global.my-announces')}}
            </a>
        </li>
        @endrole
        <li class="c-sidebar-nav-title">{{__('global.actions')}}</li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
                </svg>
                {{__('global.logout')}}
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a class="c-sidebar-nav-link" href="{{ route('home') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-home') }}"></use>
                </svg>
                {{__('global.home')}}
            </a>
        </li>
    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>
