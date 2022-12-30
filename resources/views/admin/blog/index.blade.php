@extends('admin.app')

@section('form-search')
<form class="form-inline" method="get" action="{{ route('admin.blog.search') }}">
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

        <a class="btn btn-success mb-3"  href="{{ route('admin.blog.create') }}"><i class="fa fa-plus"> Nouvelle actualité</i></a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Date de création</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($blogs as $blog)
                <tr>
                    <th scope="row">{{ $blog->id }}</th>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->category->name }}</td>
                    <td>{{ getFormatDate($blog->created_at) }}</td>
                    <td>
                     <div class="d-flex">
                        <a href="{{ route('admin.blog.delete', $blog->id) }}" class="text-white btn btn-danger mr-2"><i class="fa fa-trash"></i></a>
                        <a href="{{ route('admin.blog.edit', $blog->id) }}" class="text-white btn btn-warning"><i class="fa fa-edit"></i></a>
                     </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $blogs->links() }}
    </div>
@endsection


