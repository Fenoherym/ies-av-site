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
<form class="mt-3" method="post" action="{{ route('admin.personnel.update') }}" enctype="multipart/form-data">
    @csrf
    <input type="text" name="id" value="{{ $personnel->id }}" hidden>
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Nom: </label>
        <div class="col-sm-10">
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $personnel->name }}">
            @error('name')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="grade" class="col-sm-2 col-form-label">Titre: </label>
        <div class="col-sm-10">
        <input type="text" class="form-control @error('grade') is-invalid @enderror" id="grade" name="grade" value="{{ $personnel->grade }}">
            @error('grade')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="role" class="col-sm-2 col-form-label">Role: </label>
        <div class="col-sm-10">
        <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" name="role" value="{{ $personnel->role }}">
            @error('role')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="telephone" class="col-sm-2 col-form-label">Telephone: </label>
        <div class="col-sm-10">
        <input type="tel" class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ $personnel->telephone }}">
            @error('telephone')
                <div class="alert alert-danger mt-3">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="sex" class="col-sm-2 col-form-label">Genre: </label>
        <div class="col-sm-10">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="sex" id="sex1" value="0" @if (!$personnel->sex)
                    checked
                @endif>
                <label class="form-check-label" for="inlineCheckbox1">F</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="sex" id="sex2" value="1" @if ($personnel->sex)
                    checked
                @endif>
                <label class="form-check-label" for="sex2">M</label>
              </div>
        </div>
    </div>
    <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email: </label>
        <div class="col-sm-10">
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  value="{{ $personnel->email }}">
            @error('email')
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
@endsection
