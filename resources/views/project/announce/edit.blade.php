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
        <div class="card w-full">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-header w-full text-info font-weight-bold text-lg">
                {{__('Edit '.$announce->title.' announce')}}
            </div>
            <div class="card-body w-full">
                <form method="POST" action="{{ route('announces.update', ['announce' => $announce]) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <input class="form-control" id="username" name="username"
                               type="hidden" value="{{ $announce->user->username }}" />
                        <div class="form-group col-12 col-md-3">
                            <label for="title">{{__('global.title')}}</label>
                            <input required class="form-control" id="title" name="title"
                                   type="text" value="{{ $announce->title }}" />
                        </div>
                        <div class="form-group col-12 col-md-3">
                            @livewire('gender-component', ['selectedGender' => $announce->gender])
                        </div>
                        <div class="form-group col-12 col-md-3">
                            @livewire('announce-status-component', ['selectedStatus' => $announce->status])
                        </div>
                        <div class="form-group col-12 col-md-3">
                            @livewire('animal-type-component', ['selectedType' => $announce->type])
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 col-md-12">
                            <label for="description">{{__('global.description')}}</label>
                            <textarea required class="form-control" id="description" rows="3" name="description"
                                      type="text">{{ $announce->description }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12 col-md-6 col-lg-3">
                            <input type="hidden" value="1" id="announce_image1Remove" name="announce_image1Remove" />
                            <label for="announce_image1">{{__('global.image1')}}</label>
                            <input type="file"
                                   class="filepond announceImg"
                                   name="image1"
                                   id="announce_image1"
                                   data-max-file-size="3MB">
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <input type="hidden" value="1" id="announce_image2Remove" name="announce_image2Remove" />
                            <label for="announce_image2">{{__('global.image2')}}</label>
                            <input type="file"
                                   class="filepond announceImg"
                                   name="image2"
                                   id="announce_image2"
                                   data-max-file-size="3MB">
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <input type="hidden" value="1" id="announce_image3Remove" name="announce_image3Remove" />
                            <label for="announce_image3">{{__('global.image3')}}</label>
                            <input type="file"
                                   class="filepond announceImg"
                                   name="image3"
                                   id="announce_image3"
                                   data-max-file-size="3MB">
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                            <input type="hidden" value="1" id="announce_image4Remove" name="announce_image4Remove" />
                            <label for="announce_image4">{{__('global.image4')}}</label>
                            <input type="file"
                                   class="filepond announceImg"
                                   name="image4"
                                   id="announce_image4"
                                   data-max-file-size="3MB">
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
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-file-poster/dist/filepond-plugin-file-poster.js"></script>
    <script src="{{ asset('js/announceFilepond.js') }}"></script>
@endsection
