<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/events', 'EventsController@index')->name('events');

Route::get('/profiel', 'ProfileController@show')->name('profile');

Route::get('/admin/organizers/', 'OrganizerController@index')->name('home');

Route::get('/foo', function (\Illuminate\Http\Request $request) {
//    echo Auth::user()->can("participant_action")?"ja":"nee";
    $users = \App\User::whereHas('roles', function ($query) {
        $query->where('slug', '=', 'participant');
    })->get();//Alle participants verkrijgen
    return $users;
});

Route::get('/datatables/nederlands', function (\Illuminate\Http\Request $request) {
    return response()->json(json_decode("{
        \"sProcessing\": \"Bezig...\",
        \"sLengthMenu\": \"_MENU_ resultaten weergeven\",
        \"sZeroRecords\": \"Geen resultaten gevonden\",
        \"sInfo\": \"_START_ tot _END_ van _TOTAL_ resultaten\",
        \"sInfoEmpty\": \"Geen resultaten om weer te geven\",
        \"sInfoFiltered\": \" (gefilterd uit _MAX_ resultaten)\",
        \"sInfoPostFix\": \"\",
        \"sSearch\": \"Zoeken:\",
        \"sEmptyTable\": \"Geen resultaten aanwezig in de tabel\",
        \"sInfoThousands\": \".\",
        \"sLoadingRecords\": \"Een moment geduld aub - bezig met laden...\",
        \"oPaginate\": {
            \"sFirst\": \"Eerste\",
            \"sLast\": \"Laatste\",
            \"sNext\": \"Volgende\",
            \"sPrevious\": \"Vorige\"
        },
        \"oAria\": {
            \"sSortAscending\":  \": activeer om kolom oplopend te sorteren\",
            \"sSortDescending\": \": activeer om kolom aflopend te sorteren\"
        }
    }"));
});