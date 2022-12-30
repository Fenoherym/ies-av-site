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
    <form class="mt-3" method="post" action="{{ route('admin.concours.update') }}" enctype="multipart/form-data">
        @csrf
        <input type="text" name="id" value="{{ $concours->id }}" hidden>
        <div class="form-group row">
            <label for="isConcours" class="col-sm-4 col-form-label">Concours ou sélection: </label>
            <div class="col-sm-8">
                <select id="isConcours" class="custom-select @error('isConcours') is-invalid @enderror" name="isConcours">
                    <option value="1" @if($concours->isConcours) selected @endif>Concours</option>
                    <option value="0" @if(!$concours->isConcours) selected @endif>Sélection de dossiers</option>
                </select>
                @error('isConcours')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="depot" class="col-sm-4 col-form-label">Dépot de dossier: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control @error('depot') is-invalid @enderror" id="depot" name="depot" value="{{ $concours->depot }}">
                @error('depot')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        @if ($concours->isConcours)

        <div class="form-group row">
            <label for="date_concours" class="col-sm-4 col-form-label">Date de concours: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control @error('date_concours') is-invalid @enderror" id="date_concours" name="date_concours" value="{{ $concours->date_concours }}">
                @error('date_concours')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="convocation" class="col-sm-4 col-form-label">Convocation: </label>
            <div class="col-sm-8">
              <input type="text" class="form-control @error('convocation') is-invalid @enderror" id="convocation" name="convocation" value="{{ $concours->convocation }}">
                @error('convocation')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        @endif
        <div class="form-group row">
            <label for="droit_concours" class="col-sm-4 col-form-label">Droit de concours ou sélection de dossier</label>
            <div class="col-sm-8">
              <input type="text" class="form-control @error('droit_concours') is-invalid @enderror" id="droit_concours" name="droit_concours" value="{{ $concours->droit_concours }}">
                @error('droit_concours')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="annee_scolaire_id" class="col-sm-4 col-form-label">Année Scolaire: </label>
            <div class="col-sm-8">
                <select id="annee_scolaire_id" class="custom-select @error('annee_scolaire_id') is-invalid @enderror" name="annee_scolaire_id">
                    <option value="">-- Choisir l'année scolaire --</option>
                    @foreach ($annee_scolaires as $annee_scolaire)
                        <option value="{{ $annee_scolaire->id }}"  @if($concours->annee_scolaire_id === $annee_scolaire->id ) selected @endif>{{ $annee_scolaire->name }}</option>
                    @endforeach
                </select>
                @error('annee_scolaire_id')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="filiere_category_id" class="col-sm-4 col-form-label">Formation: </label>
            <div class="col-sm-8">
                <select id="filiere_category_id" class="custom-select @error('filiere_category_id') is-invalid @enderror" name="filiere_category_id">
                    <option value="">-- Choisir --</option>
                    @foreach ($filiere_categories as $filiere_category)
                        <option value="{{ $filiere_category->id }}" @if($concours->filiere_category_id === $filiere_category->id ) selected @endif>{{ $filiere_category->name }}</option>
                    @endforeach
                </select>
                @error('filiere_category_id')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="dossiers" class="col-sm-4 col-form-label">Dossiers à fournir: </label>
            <div class="col-sm-8">
            <textarea name="dossiers" class="form-control @error('dossiers') is-invalid @enderror" rows="5">{!!  $concours->dossiers !!}</textarea>
                @error('dossiers')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-8">
            <button type="submit" class="btn btn-outline-success">Enregistrer les modifications</button>
          </div>
        </div>
    </form>
</div>
@endsection
@section('extra-js')
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@endsection


