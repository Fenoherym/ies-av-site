@extends('admin.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 card mt-3">
                <div class="">
                    <div class="text-center p-3">
                        <img src="{{ Storage::url($enseignant->photoUrl) }}" alt="{{ $enseignant->name }}" class="img-responsive center-block" width="200px" height="200px">
                    </div>
                    <p><span class="badge bg-secondary p-2">Nom: </span> {{ $enseignant->name }}</p>
                    <p><span class="badge bg-secondary p-2">Adresse: </span> {{ $enseignant->adress }}</p>
                    <p><span class="badge bg-secondary p-2">Telephone: </span> {{ $enseignant->telephone }}</p>
                    <p><span class="badge bg-secondary p-2">Email: </span> {{ $enseignant->email }}</p>
                    <p><span class="badge bg-secondary p-2">Mention: </span> {{ $enseignant->filiere->name }}</p>


                </div>
           </div>
           <div class="col-md-3"></div>
        </div>


    </div>

@endsection
