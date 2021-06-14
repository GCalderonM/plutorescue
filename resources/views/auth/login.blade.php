@extends('layouts.master')

@section('title', 'Login')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-200 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="{{asset('images/brand_logo.svg')}}"  alt="PetRescue's logo">
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    {{__('global.login')}}
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    {{__('global.or')}}
                    <a href="{{url('register')}}" class="font-medium text-indigo-600 hover:text-indigo-500">
                        {{__('global.signin_ifNotRegister')}}
                    </a>
                </p>
            </div>
            @if ($errors->any())
                <div role="alert">
                    <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                        Auth fail!
                    </div>
                    <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            <form class="mt-8 space-y-6" action="{{route('login')}}" method="POST">
                @csrf
                <input type="hidden" name="remember" value="true">
                <div class="rounded-md shadow-sm">
                    <div class="mb-3">
                        <label for="email-address" class="sr-only">{{__('global.email')}}</label>
                        <input id="email-address" name="email" type="email" autocomplete="email" required
                               class="@error('email') is-invalid @enderror appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="{{__('global.email')}}"
                               value="{{old('email')}}">
                    </div>
                    <div>
                        <label for="password" class="sr-only">{{__('global.password')}}</label>
                        <input id="password" name="password" type="password" autocomplete="current-password" required
                               class="@error('password') is-invalid @enderror appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                               placeholder="{{__('global.password')}}">
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
                </div>

                <div>
                    <button type="submit"
                            class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                          <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-indigo-500 group-hover:text-indigo-400" xmlns="http://www.w3.org/2000/svg"
                                 fill="none" viewBox="0 0 20 20" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                          </span>
                          {{__('global.login')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
