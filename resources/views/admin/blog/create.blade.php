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
    <form class="mt-3" method="post" action="{{ route('admin.blog.store') }}" enctype="multipart/form-data">
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
            <label for="category" class="col-sm-2 col-form-label">Category: </label>
            <div class="col-sm-10">
                <select id="category_id" class="custom-select @error('category_id') is-invalid @enderror" name="category_id">
                    <option value="">-- Choisir un categorie --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="content" class="col-sm-2 col-form-label">Contenu: </label>
            <div class="col-sm-10">
            <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="5"></textarea>
                @error('content')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Ajouter une image: </label>
            <div class="col-sm-10">
            <input type="file" class="form-control-file @error('img_url') is-invalid @enderror" class="form-control" id="image" name="img_url">
            @error('img_url')
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
@section('extra-js')
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
@endsection


