@extends('admin.app')

@section('content')
<div class="w-75 ml-5 pt-5">
    <form class="mt-3" method="post" action="{{ route('admin.parcours.update', $parcours->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Parcours: </label>
            <div class="col-sm-10">
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $parcours->name }}">
                @error('name')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description: </label>
            <div class="col-sm-10">
              <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ $parcours->description }}</textarea>
                @error('description')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="filiere" class="col-sm-2 col-form-label">Mention: </label>
            <div class="col-sm-10">
                <select id="filiere" class="custom-select @error('filiere') is-invalid @enderror" name="filiere_id">
                    @foreach ($filieres as $filiere)

                        <option value="{{ $filiere->id }}"
                             @if ($filiere->id == $parcours->filiere_id)
                                 selected
                             @endif
                        >{{ $filiere->name }}</option>
                    @endforeach
                </select>
                @error('filiere')
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


