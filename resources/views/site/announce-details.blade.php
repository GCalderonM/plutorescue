@extends('layouts.master')

@section('title', __('global.announces'))

@section('content')
    <div class="bg-gray-200 text-black h-full">
        <div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-16 mx-auto text-gray-800 relative md:text-left">
            <div class="flex">
                <a href="{{ url()->previous() }}">
                    <i data-feather="arrow-left"></i>
                </a>
            </div>
            <div class="md:flex items-center -mx-10">
                <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                    <div class="relative">
                        <img src="{{ $announce->getMedia('announces_images')->count() > 0 ?
                                $announce->getMedia('announces_images')->first()->getUrl() :
                                asset('images/noImage.png') }}"
                             class="w-full relative z-10" alt="{{ $announce->title }}" id="coverImage">
                    </div>
                    @if ($announce->getMedia('announces_images')->count() > 1)
                        <div class="flex pt-5">
                            @foreach($announce->getMedia('announces_images') as $image)
                                <div class="border border-indigo-300 mr-3">
                                    <img src="{{$image->getUrl()}}"
                                         onclick="displayImage('{{ 'image_'.$image->name }}')"
                                         width="100px" alt="{{ $announce->title }}"
                                         id="{{ 'image_'.$image->name }}">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
                <div class="w-full md:w-1/2 px-10">
                    <div class="mb-10">
                        <h1 class="font-bold uppercase text-2xl mb-5">
                            {{ $announce->title }}
                        </h1>
                        <p class="text-sm">
                            {{ $announce->description }}
                        </p>
                    </div>
                    <div class="flex flex-col">
                        <div class="inline-block align-bottom mr-5">
                            <span class="text-xl leading-none align-baseline">
                                <span class="font-bold">{{ __('global.gender') }}</span>: {{ __('global.'.\App\Models\Gender::where('id' , $announce->gender)->first()->genderName) }}
                            </span>
                        </div>
                        <div class="inline-block align-bottom mr-5">
                            <span class="text-xl leading-none align-baseline">
                                <span class="font-bold">{{ __('global.status') }}</span>: {{ __('global.'.\App\Models\AnnounceStatus::where('id' , $announce->status)->first()->statusName) }}
                            </span>
                        </div>
                        <div class="inline-block align-bottom mr-5">
                            <span class="text-xl leading-none align-baseline">
                                <span class="font-bold">{{ __('global.animal-type') }}</span>: {{ __('global.'.\App\Models\AnimalType::where('id' , $announce->type)->first()->typeName) }}
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-col mt-4">
                        <h1 class="text-2xl text-red-500 font-bold">Datos del usuario</h1>
                        <div class="inline-block">
                            <span class="font-bold">{{ __('global.username') }}</span>: {{ $announce->user->name }} {{ $announce->user->surname }}
                        </div>
                        <div class="inline-block">
                            <span class="font-bold">{{ __('global.localization') }}</span>: {{ \App\Models\Community::where('id', $announce->user->community_id)->first()->name }},
                            {{ \App\Models\Province::where('id', $announce->user->province_id)->first()->name }}, {{ $announce->user->cp }}
                        </div>
                        <div class="inline-block">
                            <span class="font-bold">{{ __('global.tlfNumber') }}</span>: {{ $announce->user->tlfNumber }}
                        </div>
                        <div class="inline-block">
                            <span class="font-bold">{{ __('global.email') }}</span>: {{ $announce->user->email }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')
    <script>
        function displayImage(image)
        {
            $('#coverImage').attr('src', $('#'+image).attr('src'))
        }
    </script>
@endsection
