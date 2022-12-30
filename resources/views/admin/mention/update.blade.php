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
    <form class="mt-3" method="post" action="{{ route('admin.filiere.update', $filiere->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Titre: </label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $filiere->name }}">
                @error('name')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Contenu: </label>
            <div class="col-sm-10">
              <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ $filiere->description }}</textarea>
                @error('description')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
          </div>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-outline-success">Enregistrer les modifications</button>
          </div>
        </div>
    </form>
</div>
<script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

@endsection


