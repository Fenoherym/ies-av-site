@extends('admin.app')


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 card mt-3">
                <div class="">
                    <div class="text-center p-3">
                        <img src="{{ Storage::url($etudiant->photoUrl) }}" alt="{{ $etudiant->name }}" class="img-responsive center-block" width="200px" height="200px">
                    </div>
                    <p><span class="badge bg-secondary p-2">Nom: </span> {{ $etudiant->name }}</p>
                    <p><span class="badge bg-secondary p-2">Date de naissance: </span> {{ $etudiant->datebirth }}</p>
                    <p><span class="badge bg-secondary p-2">Adresse: </span> {{ $etudiant->adress }}</p>
                    <p><span class="badge bg-secondary p-2">Telephone: </span> {{ $etudiant->telephone }}</p>
                    <p><span class="badge bg-secondary p-2">Email: </span> {{ $etudiant->email }}</p>
                    <p><span class="badge bg-secondary p-2">Niveau: </span> {{ $etudiant->niveau->name }}</p>
                    <p><span class="badge bg-secondary p-2">Mention: </span> {{ $etudiant->parcours->filiere->name }}</p>
                    <p><span class="badge bg-secondary p-2">Parcours: </span>{{ $etudiant->parcours->name }}</p>

                     <div class="d-flex flex-row bd-highlight mb-3">
                        @if($etudiant->tranche->isDroitOk)
                        <div class="p-2"><span class="badge bg-secondary ml-2">Droit:  </span><a href="{{ route('admin.tranche.editDroit', $etudiant->id) }}"><i class="fa fa-check text-success"></i></a></div>
                        @else
                            <div class="p-2"><span class="badge bg-secondary p-2">Droit:  </span><a href="{{ route('admin.tranche.editDroit', $etudiant->id) }}"><i class="fa fa-times text-danger"></i></a></div>
                        @endif
                        @if($etudiant->tranche->isFirstTrancheOk)
                            <div class="p-2"><span class="badge bg-secondary p-2">1 ere Tranche: </span><a href="{{ route('admin.tranche.editFirstTranche', $etudiant->id) }}"><i class="fa fa-check text-success"></i></a></div>
                        @else
                            <div class="p-2"><span class="badge bg-secondary p-2">1 ere Tranche: </span><a href="{{ route('admin.tranche.editFirstTranche', $etudiant->id) }}"><i class="fa fa-times text-danger"></i></a></div>
                        @endif
                        @if($etudiant->tranche->isSecondTrancheOk)
                            <div class="p-2"><span class="badge bg-secondary p-2">2eme Tranche: </span><a href="{{ route('admin.tranche.editSecondTranche', $etudiant->id) }}"><i class="fa fa-check text-success"></i></a></div>
                        @else
                            <div class="p-2"><span class="badge bg-secondary p-2">2eme Tranche: </span><a href="{{ route('admin.tranche.editSecondTranche', $etudiant->id) }}"><i class="fa fa-times text-danger"></i></a></div>
                        @endif
                        @if($etudiant->tranche->isThirdTrancheOk)
                            <div class="p-2"><span class="badge bg-secondary p-2">3 eme Tranche: </span><a href="{{ route('admin.tranche.editThirdTranche', $etudiant->id) }}"><i class="fa fa-check text-success"></i></a></div>
                        @else
                            <div class="p-2"><span class="badge bg-secondary p-2">3 eme Tranche: </span><a href="{{ route('admin.tranche.editThirdTranche', $etudiant->id) }}"><i class="fa fa-times text-danger"></i></a></div>
                        @endif
                     </div>
                </div>
           </div>
           <div class="col-md-3"></div>
        </div>


    </div>

@endsection
