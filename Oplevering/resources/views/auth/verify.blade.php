@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verifieer e-mailadres</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Een verse link is verstuurd naar je e-mailadres.
                        </div>
                    @endif

                    Voordat je er nog een aanvraag, kijk in je inbox of je er al een hebt. ALs je er geen hebt gekregen, <a href="{{ route('verification.resend') }}">klik hier om er nog een aan te vragen</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
