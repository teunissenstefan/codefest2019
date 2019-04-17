@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Naam</th>
                        <th scope="col">Organizer</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">Datum</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>@php echo $event['name']; @endphp</th>
                            <td>@php echo $event['orginazor']; @endphp</th>
                            <td>@php echo $event['category']; @endphp</th>
                            <td>@php echo $event['date']; @endphp</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
