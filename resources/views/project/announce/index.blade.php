@extends('layouts.dashboard')

@section('title', 'Anuncios')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('my-announces.createAnnounce') }}"
                   class="btn btn-primary">{{ __('global.createAnnounce') }}</a>
            </div>
            @if ($userAnnounces->count() > 0)
                @foreach($userAnnounces as $announce)
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card border-info shadow-lg">
                                    <div class="card-body">
                                        <div class="row align-items-center">
                                            <div class="hidden d-lg-flex col-lg-2">
                                                <img src="{{ $announce->getMedia('announces_images')->count() > 0 ?
                                                $announce->getMedia('announces_images')->first()->getUrl() :
                                                asset('images/noImage.png') }}"
                                                     alt="{{ $announce->title }}"
                                                     class="img-fluid rounded" width="80px" />
                                            </div>
                                            <div class="col-12 col-lg-4">
                                                <h2>{{ $announce->title }}</h2>
                                                <span class="badge badge-danger">
                                                @if ($announce->status === 1)
                                                        {{ __('global.new') }}
                                                    @elseif ($announce->status === 2)
                                                        {{ __('global.on-hold') }}
                                                    @else
                                                        {{ __('global.adopted') }}
                                                    @endif
                                            </span>
                                                <span class="badge badge-warning">
                                                @if ($announce->gender === 1)
                                                        {{ __('global.male') }}
                                                    @else
                                                        {{ __('global.female') }}
                                                    @endif
                                            </span>
                                                <span class="badge badge-info">
                                                @if ($announce->type === 1)
                                                        {{ __('global.dog') }}
                                                    @elseif ($announce->type === 2)
                                                        {{ __('global.cat') }}
                                                    @elseif ($announce->type === 3)
                                                        {{ __('global.bird') }}
                                                    @else
                                                        {{ __('global.rodent') }}
                                                    @endif
                                            </span>
                                            </div>
                                            <div class="col-3 col-lg-2 mt-2 mt-lg-0">
                                                <div class="flex flex-column">
                                                    <h6>{{ __('global.created_at') }}</h6>
                                                    <span>{{ $announce->created_at }}</span>
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-2">
                                                <div class="flex flex-column">
                                                    <h6>{{ __('global.updated_at') }}</h6>
                                                    <span>{{ $announce->updated_at }}</span>
                                                </div>
                                            </div>
                                            <div class="col-3 col-lg-2">
                                                <a href="{{ route('my-announces.edit', ['announce' => $announce]) }}"
                                                   class="btn btn-primary">{{ __('global.edit') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="card-footer">
                    <div class="row justify-content-center">
                        <span class="text-dark font-weight-bold text-center w-100 mb-2">
                            {{ __('global.all') }}: {{ $userAnnounces->total() }} | {{ __('global.page') }} {{ $userAnnounces->currentPage() }} {{ __('global.of') }} {{ $userAnnounces->lastPage() }}
                        </span>
                        {{ $userAnnounces->links() }}
                    </div>
                </div>
            @else
                <div class="card-body">
                    <span class="text-center text-danger font-weight-bold">
                        {{ __('No tienes ningun anuncio... empieza creando tu primer anuncio!') }}
                    </span>
                </div>
            @endif
        </div>
    </div>
@endsection
