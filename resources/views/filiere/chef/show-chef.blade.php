@extends('template.app')
@section('title')
{{ $chefMention->filiere->name }}
@endsection
@section('content')
    <div class="container mt-5 pt-5 text-center">
        <h1 class="title">Chef Mention {{ $chefMention->filiere->name }}</h1>
        <img src="{{ $chefMention->photoUrl }}" alt="">
        <p class="pt-4"><span class="title">Nom: </span>{{ $chefMention->name }}</p>
        <p><span class="title">Adresse: </span>{{ $chefMention->adress }}</p>
        <p><span class="title">Téléphone: </span>{{ $chefMention->telephone }}</p>
        <p><span class="title">Email: </span>{{ $chefMention->email }}</p>
    </div>
@endsection
