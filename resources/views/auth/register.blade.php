@extends('layouts.master')

@section('title', 'Registrar')

@section('content')
    <div class="flex h-full items-center justify-center bg-gray-200 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="{{asset('images/brand_logo.svg')}}" alt="PetRescue's logo">
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    {{__('global.signin')}}
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    {{__('global.or')}}
                    <a href="{{url('login')}}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        {{__('global.login_ifRegister')}}
                    </a>
                </p>
            </div>
            <form class="mt-8 space-y-8" action="{{route('register')}}" method="POST">
                @csrf
                <input type="hidden" name="remember" value="true">
                <div class="rounded-md shadow-sm">
                    <div class="mb-3">
                        <label for="username" class="sr-only">{{__('global.username')}}</label>
                        <input id="username" name="username" type="text" autocomplete="username" required
                               class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="{{__('global.username')}}">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="sr-only">{{__('global.name')}}</label>
                        <input id="name" name="name" type="text" autocomplete="name" required
                               class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="{{__('global.name')}}">
                    </div>
                    <div class="mb-3">
                        <label for="surname" class="sr-only">{{__('global.surname')}}</label>
                        <input id="surname" name="surname" type="text" autocomplete="surname" required
                               class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="{{__('global.surname')}}">
                    </div>
                    <div class="mb-3">
                        <label for="email-address" class="sr-only">{{__('global.email')}}</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required
                               class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="{{__('global.email')}}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="sr-only">{{__('global.password')}}</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                               class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="{{__('global.password')}}">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="remember_me" name="remember_me" type="checkbox"
                               class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-900">
                            {{__('global.remember_me')}}
                        </label>
                    </div>

                    <div class="text-sm">
                        <a href="{{url('forgot-password')}}" class="font-medium text-indigo-600 hover:text-indigo-500">
                            {{__('global.forgot_password')}}
                        </a>
                    </div>
                </div>

                <div>
                    <button type="submit"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400"
                                 xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd">
                              </path>
                            </svg>
                          </span>
                        {{__('global.signin')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
