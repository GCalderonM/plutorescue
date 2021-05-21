<header>
    <nav class="flex flex-wrap items-center md:justify-between p-2 bg-gray-200 px-16 py-2">
        <div class="flex md:hidden p-2">
            <button id="hamburger">
                <svg class="text-black toggle block" xmlns="http://www.w3.org/2000/svg" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                </svg>
                <svg class="text-black toggle hidden" xmlns="http://www.w3.org/2000/svg" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <a href="{{url('/')}}" class="flex font-extrabold text-2xl text-black mx-auto md:mx-0">
            <span>pluto<span class="text-yellow-500">rescue</span></span>
        </a>
        @auth
            @role('Admin')
                <a href="{{ route('dashboard.index') }}" class="md:flex justify-center w-1/6 md:hidden">
                    <img class="h-8 w-8 rounded-full object-cover ring-1 ring-black ring-opacity-5" src="{{Auth::user()->getMedia('avatar')->first() ?
                    Auth::user()->getMedia('avatar')->first()->getUrl('avatar-thumb') : asset('images/defaultUser.png')}}" alt="{{Auth::user()->name}}" />
                </a>
            @else
                <a href="{{ route('announce.index') }}" class="md:flex justify-center w-1/6 md:hidden">
                    <img class="h-8 w-8 rounded-full object-cover ring-1 ring-black ring-opacity-5" src="{{Auth::user()->getMedia('avatar')->first() ?
                    Auth::user()->getMedia('avatar')->first()->getUrl('avatar-thumb') : asset('images/defaultUser.png')}}" alt="{{Auth::user()->name}}" />
                </a>
            @endrole
        @endauth
        @guest
            <a href="{{route('register')}}" class="block md:hidden px-3 py-2 text-left md:w-auto md:ml-4 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest focus:outline-none focus:outline-none disabled:opacity-25 transition ease-in-out duration-150 text-white rounded-md">
                <svg class="text-black" xmlns="http://www.w3.org/2000/svg" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </a>
        @endguest
            <div class="toggle hidden md:flex w-full md:w-auto text-left text-black font-bold mt-5 md:mt-0">
            <a href="{{route('home')}}" class="block text-center md:inline-block hover:text-yellow-500 px-3 py-3">Inicio</a>
            <a href="#" class="block text-center md:inline-block hover:text-yellow-500 px-3 py-3 md:border-none">Nosotros</a>
            <a href="#" class="block text-center md:inline-block hover:text-yellow-500 px-3 py-3 md:border-none">Contacto</a>
        </div>
        @auth
            @role('Admin')
                <a href="{{ route('dashboard.index') }}" class="hidden md:flex justify-center">
                    <img class="h-8 w-8 rounded-full object-cover ring-1 ring-black ring-opacity-5" src="{{Auth::user()->getMedia('avatar')->first() ?
                    Auth::user()->getMedia('avatar')->first()->getUrl('avatar-thumb') : asset('images/defaultUser.png')}}" alt="{{Auth::user()->name}}" />
                </a>
            @else
                <a href="{{route('announce.index')}}" class="hidden md:flex justify-center">
                    <img class="h-8 w-8 rounded-full object-cover ring-1 ring-black ring-opacity-5" src="{{Auth::user()->getMedia('avatar')->first() ?
                    Auth::user()->getMedia('avatar')->first()->getUrl('avatar-thumb') : asset('images/defaultUser.png')}}" alt="{{Auth::user()->name}}" />
                </a>
            @endrole
        @endauth
        @guest
            <a href="{{route('register')}}" class="hidden md:flex w-full px-3 py-2 text-left md:w-auto md:ml-4 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 text-white rounded-md">{{__('global.signin')}}</a>
        @endguest
    </nav>
</header>
