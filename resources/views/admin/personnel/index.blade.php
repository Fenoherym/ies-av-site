@extends('admin.app')

@section('form-search')
<form class="form-inline" method="get" action="{{ route('admin.personnel.search') }}">
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
        <a class="btn btn-success"  href="{{ route('admin.personnel.create') }}  "><i class="fa fa-plus"> Ajouter</i> </a>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Titre</th>
                <th scope="col">role</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($personnels as $personnel)
            <tr>
                <td>{{ $personnel->name }}</td>
                <td>{{ $personnel->grade }}</td>
                <td>{{ $personnel->role }}</td>
                <td>
                    <a class="btn btn-danger" href="{{ route('admin.personnel.delete', $personnel->id) }}" class="text-white"><i class="fa fa-trash"></i></a>
                    <a class="btn btn-warning text-white" href="{{ route('admin.personnel.edit', $personnel->id) }}" class="text-white"><i class="fa fa-edit"></i></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
