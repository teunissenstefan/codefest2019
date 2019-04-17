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

Route::get('/myevents', 'EventsController@myEvents')->name('myevents');
Route::get('/events', 'EventsController@events')->name('events');
Route::get('/event/{eventId}', 'EventsController@event')->name('event');

Route::get('/profiel', 'ProfileController@edit')->name('profile');
Route::patch('/profiel/{user}', 'ProfileController@update')->name('profile.update');

Route::get('/admin/organizers/', 'OrganizerController@index')->name('organizers.show');
Route::get('/admin/organizers/{user}/edit', 'OrganizerController@edit')->name('organizers.edit');
Route::patch('/admin/organizers/{user}/edit', 'OrganizerController@update')->name('organizers.update');
Route::delete('/admin/organizers/{user}', 'OrganizerController@delete')->name('organizers.delete');

Route::get('/admin/categorieen/', 'CategorieenController@index')->name('organizers.show');
Route::get('/admin/categorieen/{user}/edit', 'CategorieenController@edit')->name('organizers.edit');
Route::patch('/admin/categorieen/{user}/edit', 'CategorieenController@update')->name('organizers.update');
Route::delete('/admin/categorieen/{user}', 'CategorieenController@delete')->name('organizers.delete');

Route::get('/foo', function (\Illuminate\Http\Request $request) {
//    echo Auth::user()->can("participant_action")?"ja":"nee";
    $users = \App\User::whereHas('roles', function ($query) {
        $query->where('slug', '=', 'participant');
    })->get();//Alle participants verkrijgen
    return $users;
});