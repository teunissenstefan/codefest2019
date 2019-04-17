@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Naam</th>
                    <th scope="col">Beschrijving</th>
                    <th scope="col">Organizer</th>
                    <th scope="col">Categorie</th>
                    <th scope="col">Datum</th>
                    <th scope="col">Postcode</th>
                    <th scope="col">Huis nummer</th>
                    <th scope="col">Straat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>@php echo $event['name']; @endphp</th>
                        <td>@php echo $event['description']; @endphp</th>
                        <td>@php echo $event['orginazor']; @endphp</th>
                        <td>@php echo $event['category']; @endphp</th>
                        <td>@php echo $event['date']; @endphp</th>
                        <td>@php echo $event['postal_code']; @endphp</th>
                        <td>@php echo $event['house_number']; @endphp</th>
                        <td>@php echo $event['street']; @endphp</th>
                    </tr>
                </tbody>
            </table>
            @if(Gate::check('admin_action') || Gate::check('organizer_action'))
                <a class="nav-link" href="{{route('eventedit',$event->id)}}"><button type="button" class="btn btn-default btn-sm"><h3>Pas Event Aan</h3></button></a>
            @endif
        </div>
    </div>
</div>
@endsection
