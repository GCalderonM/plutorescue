@extends('layouts.dashboard')

@section('title', __('global.users'))

@section('page_styles')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
@endsection

@section('content')
    <div class="container w-full">
        <div class="card w-full">
            @include('project.dashboard.users.usersFilters')
            <div class="card-body w-full">
                <div class="table-responsive table-hover">
                    {{$dataTable->table()}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    <script src="{{ asset('js/usersDatatable.js') }}"></script>

    {{$dataTable->scripts()}}
@endsection
