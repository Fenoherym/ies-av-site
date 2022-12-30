@extends('admin.app')

@section('content')
<div class="w-75 ml-5 pt-5">

        @if (\Session::has('success'))
            <div class="alert alert-success">
                {!! \Session::get('success') !!}
            </div>
        @endif

        @if (\Session::has('error'))
            <div class="alert alert-danger">
                {!! \Session::get('error') !!}
            </div>
        @endif
    <form class="mt-3" method="post" action="{{ route('admin.etudiants.update', $etudiant->id) }}" enctype="multipart/form-data">
        @csrf
        {{-- <input type="text" hidden value="{{ $etudiant->id }}"> --}}
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nom: </label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $etudiant->name }}">
                @error('name')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="numInscription" class="col-sm-2 col-form-label">N° d'inscription: </label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('numInscription') is-invalid @enderror" id="numInscription" name="numInscription" value="{{ $etudiant->numInscription }}">
                @error('numInscription')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="datebirth" class="col-sm-2 col-form-label">Date de naissance: </label>
            <div class="col-sm-10">
              <input type="date" class="form-control @error('datebirth') is-invalid @enderror" id="datebirth" name="datebirth" value="{{ getFormatDate($etudiant->datebirth) }}">
                @error('datebirth')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="adress" class="col-sm-2 col-form-label">Adresse: </label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('adress') is-invalid @enderror" id="adress" name="adress" value="{{ $etudiant->adress }}">
                @error('adress')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="telephone" class="col-sm-2 col-form-label">Telephone: </label>
            <div class="col-sm-10">
              <input type="tel" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ $etudiant->telephone }}">
                @error('adress')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email: </label>
            <div class="col-sm-10">
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $etudiant->email }}">
                @error('adress')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="parcours_id" class="col-sm-2 col-form-label">Parcours: </label>
            <div class="col-sm-10">
                <select id="parcours_id" class="custom-select @error('parcours_id') is-invalid @enderror" name="parcours_id">
                    <option value="">-- Choisir un parcours --</option>
                    @foreach ($parcours as $parcours)
                        <option value="{{ $parcours->id }}"@if ($etudiant->parcours_id == $parcours->id)
                            selected
                        @endif>{{ $parcours->name }}</option>
                    @endforeach
                </select>
                @error('parcours_id')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
          </div>
        <div class="form-group row">
            <label for="niveau_id" class="col-sm-2 col-form-label">Niveau: </label>
            <div class="col-sm-10">
                <select id="niveau_id" class="custom-select @error('niveau_id') is-invalid @enderror" name="niveau_id">
                    <option value="">-- Choisir un niveau --</option>
                    @foreach ($niveaux as $niveau)
                        <option value="{{ $niveau->id }}" @if ($etudiant->niveau_id == $niveau->id)
                            selected
                        @endif>{{ $niveau->name }}</option>
                    @endforeach
                </select>
                @error('niveau_id')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Ajouter une image: </label>
            <div class="col-sm-10">
              <input type="file" class="form-control-file @error('photoUrl') is-invalid @enderror" class="form-control" id="image" name="photoUrl">
              @error('photoUrl')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
              @enderror
            </div>
          </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-outline-success">Enregistrer</button>
          </div>
        </div>
    </form>
</div>
@endsection


