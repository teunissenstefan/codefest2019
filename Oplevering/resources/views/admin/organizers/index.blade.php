@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Organisatoren Beheren
                        {{--<a class="btn btn-sm btn-success float-right" href="#">Toevoegen</a>--}}
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table id="organizersTable" class="table table-striped table-bordered table-responsive" style="width:100%">
                            <thead>
                            <tr>
                                <th>Naam</th>
                                <th>Aanmelder</th>
                                <th>Postcode</th>
                                <th>Straat</th>
                                <th>Huisnummer</th>
                                <th>Geboortedatum</th>
                                <th>E-mailadres</th>
                                <th>Acties</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($organizers as $organizer)
                                <tr>
                                    <td>{{$organizer->company->name}}</td>
                                    <td>{{$organizer->firstname}} {{$organizer->infix}} {{$organizer->lastname}}</td>
                                    <td>{{$organizer->postal_code}}</td>
                                    <td>{{$organizer->street}}</td>
                                    <td>{{$organizer->house_number}}</td>
                                    <td>{{\Carbon\Carbon::parse($organizer->birthdate)->format("Y-m-d")}}</td>
                                    <td>{{$organizer->email}}</td>
                                    <td>
                                        {{Form::open(['method'  => 'DELETE', 'route' => ['organizers.delete', $organizer->id]])}}
                                        <input type="submit" class="btn btn-sm btn-danger float-right" value="Verwijder"/>
                                        {{Form::close()}}
                                        <a class="btn btn-sm btn-warning float-right mr-1" href="{{route('organizers.edit',$organizer->id)}}">Bewerk</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Naam</th>
                                <th>Aanmelder</th>
                                <th>Postcode</th>
                                <th>Straat</th>
                                <th>Huisnummer</th>
                                <th>Geboortedatum</th>
                                <th>E-mailadres</th>
                                <th>Acties</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Aanmeldingen Organizers
                    </div>

                    <div class="card-body">
                        <table id="acceptOrganizersTable" class="table table-striped table-bordered table-responsive" style="width:100%">
                            <thead>
                            <tr>
                                <th>Naam</th>
                                <th>Aanmelder</th>
                                <th>Datum aanmelding</th>
                                <th>Acties</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($unaccepted_organizers as $organizer)
                                <tr>
                                    <td>{{$organizer->company->name}}</td>
                                    <td>{{$organizer->firstname}} {{$organizer->infix}} {{$organizer->lastname}}</td>
                                    <td>{{$organizer->company->created_at}}</td>
                                    <td>
                                        {{Form::open(['method'  => 'DELETE', 'route' => ['organizers.deny', $organizer->id]])}}
                                        <input type="submit" class="btn btn-sm btn-danger float-right" value="Afwijzen"/>
                                        {{Form::close()}}
                                        <a class="btn btn-sm btn-success float-right mr-1" href="{{route('organizers.accept',$organizer->id)}}">Accepteren</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Naam</th>
                                <th>Aanmelder</th>
                                <th>Datum aanmelding</th>
                                <th>Acties</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#organizersTable').dataTable({
                responsive: true,
                "language": {
                    "sProcessing": "Bezig...",
                    "sLengthMenu": "_MENU_ resultaten weergeven",
                    "sZeroRecords": "Geen resultaten gevonden",
                    "sInfo": "_START_ tot _END_ van _TOTAL_ resultaten",
                    "sInfoEmpty": "Geen resultaten om weer te geven",
                    "sInfoFiltered": " (gefilterd uit _MAX_ resultaten)",
                    "sInfoPostFix": "",
                    "sSearch": "Zoeken:",
                    "sEmptyTable": "Geen resultaten aanwezig in de tabel",
                    "sInfoThousands": ".",
                    "sLoadingRecords": "Een moment geduld aub - bezig met laden...",
                    "oPaginate": {
                        "sFirst": "Eerste",
                        "sLast": "Laatste",
                        "sNext": "Volgende",
                        "sPrevious": "Vorige"
                    },
                    "oAria": {
                        "sSortAscending": ": activeer om kolom oplopend te sorteren",
                        "sSortDescending": ": activeer om kolom aflopend te sorteren"
                    }
                }
            });
            $('#acceptOrganizersTable').dataTable({
                responsive: true,
                "language": {
                    "sProcessing": "Bezig...",
                    "sLengthMenu": "_MENU_ resultaten weergeven",
                    "sZeroRecords": "Geen resultaten gevonden",
                    "sInfo": "_START_ tot _END_ van _TOTAL_ resultaten",
                    "sInfoEmpty": "Geen resultaten om weer te geven",
                    "sInfoFiltered": " (gefilterd uit _MAX_ resultaten)",
                    "sInfoPostFix": "",
                    "sSearch": "Zoeken:",
                    "sEmptyTable": "Geen resultaten aanwezig in de tabel",
                    "sInfoThousands": ".",
                    "sLoadingRecords": "Een moment geduld aub - bezig met laden...",
                    "oPaginate": {
                        "sFirst": "Eerste",
                        "sLast": "Laatste",
                        "sNext": "Volgende",
                        "sPrevious": "Vorige"
                    },
                    "oAria": {
                        "sSortAscending": ": activeer om kolom oplopend te sorteren",
                        "sSortDescending": ": activeer om kolom aflopend te sorteren"
                    }
                }
            });
        });
    </script>
@endsection
