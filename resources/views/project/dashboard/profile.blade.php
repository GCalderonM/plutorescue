@extends('layouts.dashboard')

@section('title', __('global.edit'))

@section('page_styles')
    <!-- Filepond -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css" rel="stylesheet">
    <link href="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
@endsection

@section('content')
    <div class="container w-full">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card w-full">
            <div class="card-header w-full text-info font-weight-bold text-lg">
                {{__('Edit '.$user->username.' information')}}
            </div>
            <div class="card-body w-full">
                <form method="POST" action="{{ route('users.update', ['user' => $user]) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-12 col-md-4">
                            <input type="file" name="avatar" id="avatar" class="filepond"
                                   accept="image/png, image/jpeg, image/jpg" />
                        </div>
                        <div class="col">
                            <div class="form-group col-12 p-0">
                                <label for="username">{{__('global.username')}}</label>
                                <input required class="form-control" id="username" name="username" type="text" value="{{ $user->username }}">
                            </div>
                            <div class="form-group col-12 p-0">
                                <label for="email">{{__('global.email')}}</label>
                                <input required class="form-control" id="email" name="email" type="email" value="{{ $user->email }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="name">{{__('global.name')}}</label>
                            <input required class="form-control" id="name" name="name" type="text" value="{{ $user->name }}">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="surname">{{__('global.surname')}}</label>
                            <input required class="form-control" id="surname" name="surname" type="text" value="{{ $user->surname }}">
                        </div>
                    </div>
                    @livewire('community-province', ['selectedCommunity' => $user->province_id])
                    <div class="row">
                        <div class="form-group col-12 col-md-6">
                            <label for="cp">{{__('global.cp')}}</label>
                            <input required class="form-control" id="cp" name="cp" type="text" value="{{ $user->cp }}">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="tlfNumber">{{__('global.tlfNumber')}}</label>
                            <input required class="form-control" id="tlfNumber" name="tlfNumber" type="text" value="{{ $user->tlfNumber }}">
                        </div>
                    </div>
                    <div class="w-full">
                        <button class="btn btn-outline-success" type="submit">
                            {{__('global.save')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')
    <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js"></script>
    <script src="{{ asset('js/filepond.js') }}"></script>
@endsection
