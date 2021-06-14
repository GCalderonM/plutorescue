@extends('layouts.master')

@section('title', __('global.home'))

@section('content')
    <div class="bg-gray-200 text-black h-full">
        <div class="flex flex-wrap justify-center lg:items-center py-4 xl:py-40">
            <div class="w-10/12 md:w-4/5 lg:w-1/2 xl:w-1/3 px-4 text-center xl:text-left">
                <h1 class="text-3xl xl:text-6xl font-bold">ADOPTA TU MASCOTA FAVORITA!</h1>
                <p class="md:text-2xl text-base">Dale la vida necesaria a tu nuevo miembro de la familia. No compres, adopta!</p>
            </div>
            <div class="flex flex-wrap justify-center xl:w-1/3 py-4 xl:py-0">
                <div class="w-6/12 md:w-6/12 lg:w-1/2 xl:w-2/3 px-4">
                    <img src="{{ asset('images/dog.jpg') }}" alt="dog image"
                         class="shadow-2xl rounded-full max-w-full h-auto align-middle border-none"/>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap justify-center py-4 px-6 flex-grow">
            <form method="GET" class="w-full sm:w-4/5 xl:flex"
                  action="{{ route('search') }}">

                <div class="relative flex w-full flex-wrap items-stretch mb-6 xl:w-1/2 xl:mr-5">
                     <span
                         class="z-10 leading-snug font-normal absolute text-center text-black absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-3">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                     </span>
                    <label for="localization" class="sr-only"></label>
                    <input type="text" placeholder="Indica tu localización..."
                           id="localization"
                           name="localization"
                           class="px-3 py-3 placeholder-gray-500 text-gray-700 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:border-blue-800 w-full pl-10" required/>
                </div>
                <div class="relative flex w-full flex-wrap items-stretch mb-6 xl:w-1/3 xl:mr-5">
                    <label for="gender" class="sr-only"></label>
                    <select id="gender" name="gender" autocomplete="gender"
                            class="appearance-none px-3 py-3 placeholder-gray-500 text-gray-700 relative bg-white bg-white rounded text-sm shadow outline-none focus:outline-none focus:border-blue-800 w-full">
                        <option selected disabled>Sexo</option>
                        <option value="1">Macho</option>
                        <option value="2">Hembra</option>
                    </select>
                </div>
                <div class="relative flex w-full flex-wrap items-stretch mb-6 xl:w-1/4">
                    <input type="submit" value="Buscar"
                           class="bg-gray-800 text-white font-bold text-sm px-6 py-3 shadow font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150 text-white rounded-md cursor-pointer w-full"/>
                </div>
            </form>
        </div>
    </div>
@endsection
