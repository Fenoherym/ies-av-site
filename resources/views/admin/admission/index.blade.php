@extends('admin.app')

@section('form-search')
<form class="form-inline" method="get" action="{{ route('admin.admission.search') }}">
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

    <a class="btn btn-success mb-3"  href="{{ route('admin.admission.create') }}"><i class="fa fa-plus"> Nouveau condition d'admission</i></a>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Titre</th>
                <th scope="col">Domaine</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($admissions as $admission)
            <tr>

                <td>{{ $admission->title }}</td>
                <td>{{ $admission->filiere_category->name }}</td>

                <td>
                 <div class="d-flex">
                    <a href="{{ route('admin.admission.delete', $admission->id) }}" class="text-white btn btn-danger mr-2"><i class="fa fa-trash"></i></a>
                    <a href="{{ route('admin.admission.edit', $admission->id) }}" class="text-white btn btn-warning"><i class="fa fa-edit"></i></a>
                 </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
