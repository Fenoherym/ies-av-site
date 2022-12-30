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

        <div class="card card-ajout mb-4" style="display: none">
            <h5 class="card-header bg-success text-white">Nouvelle Category de filiere</h5>
            <div class="card-body">
                <form action="{{ route('admin.filiere.category.create') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-5">
                            <input type="text" class="form-control" placeholder="insertion" name="name">
                        </div>
                        <div class="col-md-7">
                            <button type="submit" class="btn btn-success">Ajouter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="mr-5 mb-3">
            <button class="btn btn-success" id="btn-ajout"><i class="fa fa-plus"> Nouvelle categorie de mention</i> </button>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Categorie</th>
                    <th>Supprimer</th>
                    <th>Modifier</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($filiere_categories as $filiere_category)
                <tr>
                    <td>{{ $filiere_category->name }}</td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('admin.filiere.category.delete', $filiere_category->id) }}" class="text-white"><i class="fa fa-trash"></i></a>
                    </td>
                    <td>
                        <form action="{{ route('admin.filiere.category.update') }}" method="post">
                            @csrf
                            <div class="row">
                                <input type="text" name="id" value="{{ $filiere_category->id }}" hidden>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="name"  value="{{ $filiere_category->name }}">
                                </div>
                                <div class="col-md-7">
                                    <button type="submit" class="btn btn-warning">modifier</button>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection

@section('extra-js')
    <script>
        var ajoutCard = document.querySelector('#btn-ajout');
        var card = document.querySelector('.card');
        ajoutCard.addEventListener('click', function(){
            if(card.style.display == "none"){
                card.style.display = "block";
            }else{
                card.style.display = "none";
            }
        });

    </script>
@endsection
