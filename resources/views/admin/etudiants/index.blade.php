@extends('admin.app')

@section('form-search')
<form class="form-inline" method="get" action="{{ route('admin.etudiants.search') }}">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" name="q" placeholder="Reherche" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar ml-2" type="submit">
          <i class="fa fa-search"></i>
        </button>
        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
        </button>
      </div>
    </div>
  </form>
@endsection

@section('content')

<div class="p-4">

    <form action="{{ route('admin.etudiants.search') }}" method="get">
        <div class="row">
            <div class="col-md-4">
                 <div class="form-group input-group">
                     <input type="search" class="form-control" name="q" placeholder="Rechercher">
                 </div>
            </div>
            <div class="col-md-4">
                 <div class="form-group">
                     <select class="form-control @error('niveau_id') is-invalid @enderror" name="niveau_id">
                        <option value="">-- Choisir le niveau --</option>
                     @foreach ($niveaux as $niveau)
                          <option value="{{ $niveau->id }}">{{ $niveau->name }}</option>
                     @endforeach
                     @error('niveau_id')
                     <div class="alert alert-danger mt-3">{{ $message }}</div>
                     @enderror
                     </select>

                 </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <select class="form-control @error('parcours_id') is-invalid @enderror" name="parcours_id">
                        <option value="">-- Choisir le parcours --</option>
                    @foreach ($parcours as $parcours_data)
                        <option value="{{ $parcours_data->id }}">{{ $parcours_data->name }}</option>
                    @endforeach
                    @error('parcours_id')
                    <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </select>
                </div>
            </div>
            <div class="input-group">
                <button class="btn btn-outline-success mt-3"><i class="fa fa-search"> Rechercher</i></button>
            </div>
       </div>
    </form>

</div>

<div class="container m-3">

    @if (\Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
    @endif

    <div class="mr-5 mb-3">
        <a class="btn btn-success"  href="{{ route('admin.etudiants.create') }}"><i class="fa fa-plus"> Ajouter un étudiant</i> </a>
    </div>
    @if (isset($etudiants))
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Numero d'inscription</th>
                <th scope="col">Nom</th>
                <th scope="col">Parcours</th>
                <th>Niveau</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($etudiants as $etudiant)
            <tr>
                <td> {{ $etudiant->numInscription  }} </td>
                <td><a href="{{ route('admin.etudiants.show', $etudiant->id) }}">{{ $etudiant->name }}</a></td>
                <td> {{ $etudiant->parcours->name }} </td>
                <td> {{ $etudiant->niveau->name  }} </td>
                <td>
                    <div class="btn btn-danger" onclick="alert('Etes vous sur de volouir supprimer cette étudiant')"><a href="{{ route('admin.etudiants.delete', $etudiant->id) }}" class="text-white"><i class="fa fa-trash"></i></a></div>
                    <div class="btn btn-warning"><a href="{{ route('admin.etudiants.edit', $etudiant->id) }}" class="text-white"><i class="fa fa-edit"></i></a></div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>

@endsection
