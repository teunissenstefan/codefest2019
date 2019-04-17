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

Route::get('/admin/organizers/', 'OrganizerController@index')->name('organizers.show');
Route::delete('/admin/organizers/{user}', 'OrganizerController@delete')->name('organizers.delete');

Route::get('/foo', function (\Illuminate\Http\Request $request) {
//    echo Auth::user()->can("participant_action")?"ja":"nee";
    $users = \App\User::whereHas('roles', function ($query) {
        $query->where('slug', '=', 'participant');
    })->get();//Alle participants verkrijgen
    return $users;
});