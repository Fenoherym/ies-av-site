@extends('admin.app')

@section('content')
    <div class="container m-3">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                {!! \Session::get('success') !!}
            </div>
        @endif

        <div class="mr-5 mb-3">
            <a class="btn btn-success" href="{{ route('admin.partenariat.create') }}  ">
                <i class="fa fa-plus"> Ajouter un nouveau partenaire</i>
            </a>

        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">nom</th>
                        <th scope="col">lien</th>
                        <th scope="col">image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($partenariats as $partenariat)
                        <tr>
                            <td>{{ $partenariat->name }}</td>
                            <td><a href="{{ $partenariat->url }}">{{ $partenariat->url }}</a></td>
                            <td>
                                <img src="{{ Storage::url($partenariat->logoImg) }}" alt="" width="100px" height="100px"
                                    style="object-fit: cover;">
                            </td>
                            <td>
                                <div class="btn btn-danger">
                                    <a href="{{ route('admin.partenariat.delete', $partenariat->id) }}"
                                        class="text-white"><i class="fa fa-trash"></i>
                                    </a>
                                </div>
                                <div class="btn btn-warning">
                                    <a href="{{ route('admin.partenariat.edit', $partenariat->id) }}"
                                        class="text-white"><i class="fa fa-edit"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
