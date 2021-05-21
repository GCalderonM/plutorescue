<header class="c-header c-header-light c-header-fixed c-header-with-subheader">
    <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
        <svg class="c-icon c-icon-lg">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
        </svg>
    </button>
    <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
        <svg class="c-icon c-icon-lg">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-menu') }}"></use>
        </svg>
    </button>
    <div class="c-header-nav ml-auto mr-4">
        <div class="flex flex-col mr-2">
            <span class="font-bold">{{ Auth::user()->username }}</span>
            <span class="badge badge-pill badge-info">
                        {{ Auth::user()->roles()->first()->name }}
            </span>
        </div>
        <div class="c-header-nav-link">
            <div class="c-avatar">
                <img class="c-avatar-img" src="{{Auth::user()->getMedia('avatar')->first() ?
                    Auth::user()->getMedia('avatar')->first()->getUrl('avatar-thumb') : asset('images/defaultUser.png')}}" alt="{{Auth::user()->name}}">
            </div>
        </div>
    </div>
</header>
