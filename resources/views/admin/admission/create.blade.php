@extends('admin.app')

@section('content')
<div class="container">
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
    <form class="mt-3" method="post" action="{{ route('admin.admission.store') }}">
        @csrf
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Titre: </label>
            <div class="col-sm-10">
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Titre..">
                @error('title')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="category" class="col-sm-2 col-form-label">Titre: </label>
            <div class="col-sm-10">
                <select id="filiere_category_id" class="custom-select @error('filiere_category_id') is-invalid @enderror" name="filiere_category_id">
                    <option value="">-- Choisir le domaine --</option>
                    @foreach ($filiere_categories as $domaine)
                        <option value="{{ $domaine->id }}">{{ $domaine->name }}</option>
                    @endforeach
                </select>
                @error('filiere_category_id')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Contenu: </label>
            <div class="col-sm-10">
            <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5"></textarea>
                @error('description')
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

<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

@endsection


