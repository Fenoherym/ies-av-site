@extends('admin.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card mt-3 shadow-lg mb-5 bg-white rounded" style="width: 38rem;">
            <div class="alert text-white" style="background: #005F40" role="alert">
                <p>{{ $message->email }}</p>
            </div>
            <div class="p-5">
                <p>{{ $message->message }}</p>
            </div>
            <div class="p-5">
                <form method="post" action="{{ route('admin.mail.send') }}">
                    @csrf
                    <input type="text" name="email" value="{{ $message->email }}" hidden>
                    <div class="mt-3 px-5">
                        <textarea class="form-control" id="message" rows="5" name="message" required="required"
                            placeholder="Répondre"></textarea>
                    </div>
                    <div class="d-flex  justify-content-center">
                        <button class="btn btn-success mt-3" type="submit">Envoyer</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
