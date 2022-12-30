@extends('template.app')

@section('title')
    Mentions
@endsection

@section('content')
    <div class="container mt-5 pt-5  animate__animated animate__bounce">
        <h1 class="text-center title">{{ $filiere->name }}</h1>
        <div class="row mt-4">
            <div class="col-md-8">
                <div class="article shadow-lg p-3 mb-5 bg-body rounded">
                    <div class="article-title">
                        @foreach ($filiere->enseignants as $enseignant)
                            @if ($enseignant->isChefMention)
                                <h3>
                                    Chef de Mention:
                                    <a href="{{ route('filiere.chef', $filiere->id) }}">{{ $enseignant->name }}</a>
                                </h3>
                                <hr>
                            @endif
                        @endforeach
                    </div>
                    <div class="filiere-card mb-5">
                        <div class="card-body">
                            <p class="card-text">
                                {!! $filiere->description !!}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4">

                <div class="aside shadow-lg p-3 mb-5 bg-body rounded mx-4">
                    <div class="card-body">
                        <h5 class="aside-title">Parcours</h5>
                        <ul>
                            @foreach ($filiere->parcours as $parcours)
                                <li><i class="fa fa-chevron-right"></i> {{ $parcours->name }}</li>
                            @endforeach
                        </ul>
                        <hr>
                        <h5 class="aside-title">Autres Mentions</h5>
                        <ul>
                            @foreach ($filieres as $filiere)
                                <li><i class="fa fa-chevron-right"></i><a href="{{ route('filiere.show', $filiere->id) }}"
                                        class="text-dark"> {{ $filiere->name }}</a></li>
                            @endforeach
                        </ul>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
