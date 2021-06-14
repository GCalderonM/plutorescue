@extends('layouts.dashboard')

@section('title', __('global.home'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted text-right mb-4">
                            <svg class="c-icon c-icon-2xl">
                                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-people') }}"></use>
                            </svg>
                        </div>
                        <div class="text-value-lg">
                            {{ $users }}
                        </div>
                        <small class="text-muted text-uppercase font-weight-bold">
                            {{ __('global.users') }}
                        </small>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted text-right mb-4">
                            <svg class="c-icon c-icon-2xl">
                                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-clipboard') }}"></use>
                            </svg>
                        </div>
                        <div class="text-value-lg">
                            {{ $announces }}
                        </div>
                        <small class="text-muted text-uppercase font-weight-bold">
                            {{ __('global.announces') }}
                        </small>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="text-muted text-right mb-4">
                            <svg class="c-icon c-icon-2xl">
                                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-contact') }}"></use>
                            </svg>
                        </div>
                        <div class="text-value-lg">
                            {{ $accessLogs }}
                        </div>
                        <small class="text-muted text-uppercase font-weight-bold">
                            {{ __('global.accessLog') }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
