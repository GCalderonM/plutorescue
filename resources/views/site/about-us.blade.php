@extends('layouts.master')

@section('title', __('global.about-us'))

@section('page_styles')
    <link href="{{ asset('css/about-us.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="bg-gray-200 text-black h-full">
        <h1 class="text-4xl font-bold underline text-center pt-4">{{ __('Conoce el equipo...') }}</h1>
        <div class="flex flex-wrap flex-col pt-4 items-center">
            <img src="{{ asset('images/developers/yo.jpeg') }}"
                 class="rounded-full developerImg border border-black"
                 alt="Guillermo Calderón Musi" />
            <span class="p-2 mt-3 font-bold bg-indigo-600 text-white rounded-full">CEO / Developer</span>
        </div>
        <div class="flex flex-wrap p-3 justify-center">
            <h1 class="text-4xl font-bold underline text-center pt-4">{{ __('¿Que es PlutoRescue?') }}</h1>
        </div>
        <div class="flex flex-wrap text-center pt-3">
            <p class="text-2xl px-5 lg:px-40 font-bold">
                PlutoRescue es una aplicación web que promueve adoptar animales que son
                abandonados y encontrados por personas. Con esto, promovemos que los refugios
                no se llenen y muchos de estos animales sean sacrificados.
            </p>
        </div>
        <div class="flex flex-wrap text-center pt-3">
            <p class="text-xl px-5 lg:px-40 font-bold">
                Permitimos a todas las personas que  puedan logearse dentro de la aplicación y subir
                anuncios sobre los animales que se encuentren.
            </p>
        </div>
    </div>
@endsection
