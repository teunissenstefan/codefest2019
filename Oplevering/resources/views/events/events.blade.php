@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <div class="card-header">Events</div>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                            <tr>
                                <td>@php echo $event['name']; @endphp</th>
                                <td>@php echo $event->user['firstname']; @endphp</td>
                                <td>@php echo $event['category']; @endphp</td>
                                <td>@php echo $event['date']; @endphp</td>
                                <td><a class="nav-link" href="{{route('event',$event->id)}}"><button type="button" class="btn btn-default btn-sm"><img src="IMG/info.png" height="25px" width="25px"> Info   </button></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
