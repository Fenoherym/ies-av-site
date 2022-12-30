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
    <form class="mt-3" method="post" action="{{ route('admin.enseignant.update', $enseignant->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Nom: </label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $enseignant->name }}">
                @error('name')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="adress" class="col-sm-2 col-form-label">Adresse: </label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('adress') is-invalid @enderror" id="adress" name="adress" value="{{ $enseignant->adress }}">
                @error('adress')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="telephone" class="col-sm-2 col-form-label">Telephone: </label>
            <div class="col-sm-10">
              <input type="tel" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ $enseignant->telephone }}">
                @error('telephone')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email: </label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $enseignant->email }}">
                @error('email')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="parcours_id" class="col-sm-2 col-form-label">Parcours: </label>
            <div class="col-sm-10">
                <select id="filiere_id" class="custom-select @error('filiere_id') is-invalid @enderror" name="filiere_id">
                    <option value="">-- Choisir une filière --</option>
                    @foreach ($filieres as $filiere)
                        <option value="{{ $filiere->id }}" @if($filiere->id == $enseignant->filiere_id) selected  @endif>{{ $filiere->name }}</option>
                    @endforeach
                </select>
                @error('filiere_id')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
          <div class="form-group row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="isChef" id="flexCheckDisabled" @if($enseignant->isChefMention) checked  @endif>
                    <label class="form-check-label" for="flexCheckDisabled">
                      Chef de metion
                    </label>
                  </div>
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


