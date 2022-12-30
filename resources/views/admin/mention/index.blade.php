@extends('admin.app')

@section('form-search')
<form class="form-inline" method="get" action="{{ route('admin.filiere.search') }}">
    <div class="input-group input-group-sm">
      <input class="form-control form-control-navbar" type="search" name="q" placeholder="Search" aria-label="Search">
      <div class="input-group-append">
        <button class="btn btn-navbar" type="submit">
          <i class="fa fa-search"></i>
        </button>
        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
        </button>
      </div>
    </div>
  </form>
@endsection

@section('content')
    <div class="container m-3">

        @if (\Session::has('success'))
            <div class="alert alert-success">
                {!! \Session::get('success') !!}
            </div>
        @endif

        <div class="mr-5 mb-3">
            <a class="btn btn-success"  href="{{ route('admin.filiere.create') }}  "><i class="fa fa-plus"> Nouvelle mention</i> </a>
            <a class="btn btn-success ml-5"  href="{{ route('admin.parcours.create') }}  "><i class="fa fa-plus"> Nouveau parcours</i> </a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Mention</th>
                    <th scope="col">Parcours</th>
                    <th scope="col">Mention Categorie</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($filieres as $filiere)
                <tr>
                    <td>{{ $filiere->name }}</td>
                    <td>
                      @foreach ($filiere->parcours as $parcours)
                          {{ $parcours->name }}
                          <a href="{{ route('admin.parcours.delete', $parcours->id) }}"><i class="fa fa-trash"></i>  </a>
                          <a href="{{ route('admin.parcours.edit', $parcours->id) }}"><i class="fa fa-edit"></i>  </a>
                          <a href="{{ route('admin.etudiants.index') }}">Voir listes des étudiants</a><br><hr>
                      @endforeach
                    </td>
                    <td>{{ $filiere->filiere_category->name }}</td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('admin.filiere.delete', $filiere->id) }}" class="text-white"><i class="fa fa-trash"></i></a>
                        <a class="btn btn-warning text-white" href="{{ route('admin.filiere.edit', $filiere->id) }}" class="text-white"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
