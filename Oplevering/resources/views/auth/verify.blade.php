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

                    Voordat je een e-mail aanvraagt, kijk of er al een in je inbox staat. Als je er nog geen hebt, <a href="{{ route('verification.resend') }}">klik hier om er nog een aan te vragen</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
