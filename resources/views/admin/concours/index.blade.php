@extends('admin.app')

@section('content')
<div class="container m-3">

    @if (\Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
    @endif

    <a class="btn btn-success mb-3"  href="{{ route('admin.concours.create') }}"><i class="fa fa-plus"> Ajouter</i></a>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Concours&Sélection de dossiers</th>
                <th scope="col">Domaine</th>
                <th scope="col">Année Scolaire</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($concours as $concours)
            <tr>

                <td>
                    @if ($concours->isConcours)
                        Concours
                    @else
                        Sélection de dossier
                    @endif
                </td>
                <td>{{ $concours->filiere_category->name }}</td>
                <td>{{ $concours->annee_scolaire->name }}</td>
                <td>
                 <div class="d-flex">
                    <a href="{{ route('admin.concours.delete', $concours->id) }}" class="text-white btn btn-danger mr-2"><i class="fa fa-trash"></i></a>
                    <a href="{{ route('admin.concours.edit', $concours->id) }}" class="text-white btn btn-warning"><i class="fa fa-edit"></i></a>
                 </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
