@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                    <div class="card-header">MyEvents</div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <h2>Aankomende evenementen</h2>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Naam</th>
                        <th scope="col">Organizer</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">Datum</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($openEvents as $event)
                            {{-- @if($event['finished'] == 0) --}}
                                <tr>
                                    <td>@php echo $event['name']; @endphp</th>
                                    <td>@php echo $event['orginazor']; @endphp</td>
                                    <td>@php echo $event['category']; @endphp</td>
                                    <td>@php echo $event['date']; @endphp</td>
                                    <td><a class="nav-link" href="{{route('event',$event->id)}}"><button type="button" class="btn btn-default btn-sm"><img src="IMG/info.png" height="25px" width="25px"> Info   </button></a></td>
                                    <td>
                                        {{Form::open(['method'  => 'DELETE', 'route' => ['event.remove', $event->id]])}}
                                        <input type="image" src="IMG/close.png" class="btn btn-default btn-sm" height="35px" width="45px">
                                        {{Form::close()}}
                                    </td>
                                </tr>
                            {{-- @endif --}}
                        @endforeach
                    </tbody>
                </table>
                @php @endphp
                <h2>Afgesloten evenementen</h2>
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Naam</th>
                        <th scope="col">Organizer</th>
                        <th scope="col">Categorie</th>
                        <th scope="col">Datum</th>
                        <th scope="col">Punten, plaats</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($finishedEvents as $event)
                            {{-- @if($event['finished'] == 1) --}}
                                <tr>
                                    <td>@php echo $event['name']; @endphp</th>
                                    <td>@php echo $event['orginazor']; @endphp</td>
                                    <td>@php echo $event['category']; @endphp</td>
                                    <td>@php echo $event['date']; @endphp</td>
                                    <td>@php echo $event['place_points']; @endphp</td>
                                    <td><a class="nav-link" href="{{route('event',$event->id)}}"><button type="button" class="btn btn-default btn-sm"><img src="IMG/info.png" height="25px" width="25px"> Info   </button></a></td>
                                </tr>
                            {{-- @endif --}}
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
