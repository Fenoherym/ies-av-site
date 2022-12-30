@extends('admin.app')

@section('form-search')
<form class="form-inline" method="get" action="{{ route('admin.enseignant.search') }}">
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

<div class="container m-3">

    @if (\Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
    @endif

    <div class="mr-5 mb-3">
        <a class="btn btn-success"  href="{{ route('admin.enseignant.create') }}"><i class="fa fa-plus"> Ajouter un enseignant</i> </a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Filiere</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($enseignants as $enseignant)
            <tr>
                <td><a href="{{ route('admin.enseignant.show', $enseignant->id) }}"> {{ $enseignant->name  }} </a> </td>
                <td> {{ $enseignant->filiere->name }} </td>
                <td>
                    <div class="btn btn-danger" onclick="confirm('Etes vous sur de volouir supprimer cette enseignant')"><a href="{{ route('admin.enseignant.delete', $enseignant->id) }}" class="text-white"><i class="fa fa-trash"></i></a></div>
                    <div class="btn btn-warning"><a href="{{ route('admin.enseignant.edit', $enseignant->id) }}" class="text-white"><i class="fa fa-edit"></i></a></div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
