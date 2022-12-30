@extends('admin.app')

@section('form-search')
    <form class="form-inline" method="get" action="{{ route('admin.galery.search') }}">
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
            <a class="btn btn-success" href="{{ route('admin.galery.create') }}  "><i class="fa fa-plus"> Ajouter une
                    image dans la galerie</i> </a>

        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Titre</th>
                        <th scope="col">image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($galeries as $galery)
                        <tr>
                            <td>{{ $galery->title }}</td>
                            <td><img src="{{ Storage::url($galery->img_url) }}" alt="" width="70px" height="70px"
                                    style="border-radius: 50%"></td>
                            <td>
                                <div class="btn btn-danger"><a href="{{ route('admin.galery.delete', $galery->id) }}"
                                        class="text-white"><i class="fa fa-trash"></i></a></div>
                                {{-- <div class="btn btn-warning"><a href="{{ route('admin.filiere.edit', $galery->id) }}" class="text-white"><i class="fa fa-edit"></i></a></div> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
