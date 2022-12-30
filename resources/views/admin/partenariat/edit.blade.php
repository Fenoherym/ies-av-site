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
        <form class="mt-3" method="post" action="{{ route('admin.partenariat.update', $partenariat->id) }}"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Titre de l'image: </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                        placeholder="Titre.." value="{{ $partenariat->name }}">
                    @error('name')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="url" class="col-sm-2 col-form-label">lien </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url"
                        placeholder="Lien du site.." value="{{ $partenariat->url }}">
                    @error('url')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label">Ajouter une image: </label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file @error('logoImg') is-invalid @enderror"
                        class="form-control" id="image" name="logoImg">
                    @error('logoImg')
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
