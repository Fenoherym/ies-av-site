@extends('template.app')

@section('title')
    Concours
@endsection

@section('content')
    <div class="container mt-5 pt-5">
        <div class="concours-content">
            <h1 class="title text-center">Concours et sélection de dossier {{ getActiveAnnee()->name }}</h1>
            <hr>
            <div class="content-block mt-2">
                {{-- <div class="row"> --}}
                @foreach ($concours as $concours)
                    @if ($concours->isConcours)
                        <div class="d-flex justify-content-center ">
                            <div class="card shadow-lg p-3 mb-5 bg-body rounded" style="width: 40rem;">
                                <div class="concours">
                                    <h3> {!! $concours->filiere_category->name !!}</h3>
                                    <div class="item">
                                        <h5> Date du dépot de dossier</h5>
                                        <p>
                                            {{ $concours->depot }}
                                        </p>
                                    </div>
                                    <div class="item">
                                        <h5>Date de concours
                                        </h5>
                                        <p>
                                            {!! $concours->date_concours !!}
                                        </p>
                                    </div>
                                    <div class="item">
                                        <h5> Convocation</h5>
                                        <p>
                                            {{ $concours->convocation }}
                                        </p>
                                    </div>
                                    <div class="item">
                                        <h5><i class="" aria-hidden="true"></i> Dossier à fournir
                                        </h5>
                                        <p>
                                            {!! $concours->dossiers !!}
                                        </p>
                                    </div>
                                    <div class="item">
                                        <h5> Droit de concours
                                        </h5>
                                        <p>
                                            {!! $concours->droit_concours !!}
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @else
                        <div class="d-flex justify-content-center ">
                            <div class="card mt-3 p-3 mb-5 bg-body rounded" style="width: 40rem;">
                                <div class="concours">
                                    <h3><i class="fa fa-hand-o-right" aria-hidden="true"></i> {!! $concours->filiere_category->name !!}</h3>
                                    <div class="item">
                                        <h5>Date du dépot de
                                            dossier</h5>
                                        <p>
                                            {{ $concours->depot }}
                                        </p>
                                    </div>
                                    <div class="item">
                                        <h5> Dossier à fournir
                                        </h5>
                                        <p>
                                            {!! $concours->dossiers !!}
                                        </p>
                                    </div>
                                    <div class="item">
                                        <h5>
                                            Droit de candidature
                                        </h5>
                                        <p>
                                            {!! $concours->droit_concours !!}
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                {{-- </div> --}}

            </div>
        </div>
    </div>
@endsection
