@extends('template.app')

@section('title')
    Admission
@endsection

@section('extra-css')
    <style>
        .content img {
            width: 100%;
            height: 70vh;
            object-fit: cover;
        }

    </style>
@endsection

@section('content')
@section('content')
    <div class="container mt-5 pt-5 mb-5 pb-5">
        <div class="text-center">
            <h1 class="title">Admission</h1>
            <h5>"Les conditions a remplir pour êtres admis(e) à l'Institut d'Enseignement Supérieur Antsirabe Vakinakaratra"
            </h5>
            <hr>
        </div>

        <section class="admission">
            @foreach ($admissions as $admission)
                <div class="card">
                    <div class="info bg-white">
                        <h2 class="title">{{ $admission->filiere_category->name }}</h2>
                        <h2 class="title">{{ $admission->title }}</h2>
                        <p>{!! $admission->description !!}</p>
                    </div>
                </div>
            @endforeach
            <section>
    </div>
@endsection
@endsection
