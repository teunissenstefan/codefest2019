@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Categorieen Beheren
                        <a class="btn btn-sm btn-success float-right" href="{{route('categories.new')}}">Toevoegen</a></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table id="CategoriesTable" class="table table-striped table-bordered table-responsive" style="width:100%">
                            <thead>
                            <tr>
                                <th>Naam</th>
                                <th>Organizer</th>
                                <th>Categorie</th>
                                <th>Datum</th>
                                <th>Bijnaam</th>
                                <th>Knoppen</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td>{{$event->name}}</td>
                                    <td>{{$event->orginazor}}</td>
                                    <td>{{$event->category}}</td>
                                    <td>{{$event->date}}</td>
                                    <td>{{$event->slug}}</td>
                                    <td>
                                        {{Form::open(['method'  => 'DELETE', 'route' => ['categories.delete', $event->id]])}}
                                        <input type="submit" class="btn btn-sm btn-danger float-right" value="Verwijder"/>
                                        {{Form::close()}}
                                        <a class="btn btn-sm btn-warning float-right mr-1" href="{{route('categories.edit',$event->id)}}">Bewerk</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Naam</th>
                                <th>Organezir</th>
                                <th>Categorie</th>
                                <th>Datum</th>
                                <th>Bijnaam</th>
                                <th>Knoppen</th>
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
            $('#CategoriesTable').dataTable({
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