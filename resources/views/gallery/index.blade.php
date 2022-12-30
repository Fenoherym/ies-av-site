@extends('template.app')

@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/lightbox.min.css') }}">
@endsection

@section('title')
   Galerie-photo
@endsection

@section('content')

<div class="container mt-5 py-5">
    <h1 class="title text-center">Galleries photo</h1><hr>
    <div class="row p-0 m-0">
        @foreach ($galeries as $galerie)
        <div class="galery-container col-md-4 p-0 m-0">
            <div class="container-img" data-aos="zoom-in-up">
                <a href="{{ Storage::url($galerie->img_url) }}" data-lightbox="mygallery" data-title="{{ $galerie->title }}"><img src="{{ Storage::url($galerie->img_url) }}" alt=""></a>
                <div class="text">
                    <h4>{{ $galerie->title }}</h4>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection

@section('extra-js')
<script src="{{ asset('js/lightbox-plus-jquery.min.js') }}"></script>
@endsection
