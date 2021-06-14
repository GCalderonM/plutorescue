@extends('layouts.master')

@section('title', __('global.announces'))

@section('content')
    <div class="bg-gray-200 text-black">
        @if (isset($announces))
        <div class="container mx-auto px-4 md:px-12">
            <div class="flex flex-wrap -mx-1 lg:-mx-4">
                @foreach($announces as $announce)
                <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3 xl:w-1/4">
                        <div class="bg-white shadow-md rounded-3xl p-4">
                            <div class="h-full w-full lg:h-48 lg:w-48 lg:mb-0 mb-3">
                                <img src="{{ $announce->getMedia('announces_images')->count() > 0 ?
                                $announce->getMedia('announces_images')->first()->getUrl() :
                                asset('images/noImage.png') }}"
                                     alt="{{ $announce->title }}"
                                     class=" w-full object-scale-down lg:object-cover lg:h-48 rounded-2xl">
                            </div>
                            <div class="flex-auto ml-3 justify-evenly py-2">
                                <div class="flex flex-wrap">
                                    <h2 class="flex-auto text-lg font-medium">
                                        {{ $announce->title }}
                                    </h2>
                                </div>
                                <p class="mt-3"></p>
                                <div class="flex py-4 text-sm text-gray-600">
                                    <div class="flex-1 inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                            </path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <p class="">
                                            {{ \App\Models\Community::where('id', $announce->user->community_id)->first()->name }},
                                            {{ \App\Models\Province::where('id', $announce->user->province_id)->first()->name }}
                                        </p>
                                    </div>
                                    <div class="flex-1 inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                             viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        <p class="">
                                            {{ $announce->created_at }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex p-4 pb-2 border-t border-gray-200 "></div>
                                <div class="flex space-x-3 text-sm font-medium">
                                    <a href="{{ route('viewAnnounce', Str::slug($announce->title, '-')) }}"
                                       class="mb-2 md:mb-0 bg-gray-900 px-5 py-2 shadow-sm tracking-wider text-white rounded-full hover:bg-gray-800">
                                        {{ __('Ver detalles') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                </div>
                @endforeach
            </div>
            <div class="flex justify-center items-center py-2">
                    <span class="text-dark font-bold text-center w-100 mr-2">
                        {{ __('global.all') }}: {{ $announces->total() }} | {{ __('global.page') }} {{ $announces->currentPage() }} {{ __('global.of') }} {{ $announces->lastPage() }}
                    </span>
                {{ $announces->appends(request()->query())->links() }}
            </div>
        </div>
        @else
            <div class="flex h-screen text-center">
                <div class="flex-col justify-center items-center self-center space-y-8 m-auto">
                    <h1 class="text-2xl font-bold">Lo sentimos, no hay anuncios disponibles para tu localizacion!</h1>
                    <h5>
                        Vuelve atrás y busca en otro sitio!
                        <a class="font-bold text-indigo-600" href="{{ route('home') }}">Volver atrás</a>
                    </h5>
                </div>
            </div>
        @endif
@endsection
