@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card">
                        <div class="card-header">Event</div>
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
                                <td>@php echo $event->user->firstname; @endphp</th>
                                <td>@php echo $event->category->category; @endphp</th>
                                <td>@php echo $event['date']; @endphp</th>
                                <td>@php echo $event['postal_code']; @endphp</th>
                                <td>@php echo $event['house_number']; @endphp</th>
                                <td>@php echo $event['street']; @endphp</th>
                            </tr>
                        </tbody>
                    </table>
                    @if(Gate::check('participant_action'))
                        @if($event->participating_users->contains(Auth::user()))
                            <a class="nav-link" href="{{route('eventunsign',$event->id)}}"><button type="button" class="btn btn-default btn-sm">Meld Je Af</button></a>
                        @else
                            <a class="nav-link" href="{{route('eventsign',$event->id)}}"><button type="button" class="btn btn-default btn-sm">Meld Je Aan</button></a>
                        @endif
                    @endif

                    @if(Gate::check('organizer_action'))
                            <a class="nav-link" href="{{route('events.close',$event->id)}}"><button type="button" class="btn btn-default btn-sm">Evenement Afsluiten</button></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
