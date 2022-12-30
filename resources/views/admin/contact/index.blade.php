@extends('admin.app')

@section('content')
<table class="table mt-3">
    <thead>
      <tr>

        <th scope="col">Nom</th>
        <th scope="col">Email</th>
        <th scope="col">Message</th>
        <th scope="col">date d'envoi</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($messages as $message)
        <tr>
            <td>{{ $message->name }}</td>
            <td>{{ $message->email }}</td>
            <td>{{ substr($message->message, 0,50) }}...</td>
            <td>{{ $message->created_at }}...</td>
            <td>
                <a href="{{ route('admin.contact.show', $message->id) }}" class="btn btn-secondary">Voir</a>
                <a href="" class="btn btn-danger">Supprimer</a>
            </td>
        </tr>
    @endforeach

    </tbody>
  </table>
@endsection
