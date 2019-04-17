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
Route::get('/addevent', 'EventsController@addEvent')->name('addevent');
Route::get('/eventedit/{eventId}', 'EventsController@eventEdit')->name('eventedit');
Route::post('/addevent', 'EventsController@eventStore')->name('event.add');
Route::delete('/event/remove/{event}', 'EventsController@remove')->name('event.remove');

Route::get('/profiel', 'ProfileController@edit')->name('profile');
Route::patch('/profiel/{user}', 'ProfileController@update')->name('profile.update');

Route::get('/admin/organizers/', 'OrganizerController@index')->name('organizers.show');
Route::get('/admin/organizers/{user}/edit', 'OrganizerController@edit')->name('organizers.edit');
Route::patch('/admin/organizers/{user}/edit', 'OrganizerController@update')->name('organizers.update');
Route::delete('/admin/organizers/{user}', 'OrganizerController@delete')->name('organizers.delete');
Route::delete('/admin/organizers/{user}/deny', 'OrganizerController@deny')->name('organizers.deny');
Route::get('/admin/organizers/{user}/accept', 'OrganizerController@accept')->name('organizers.accept');

Route::get('/admin/categorieen/', 'CategorieenController@index')->name('categories.show');
Route::get('/admin/categorieen/{category}/edit', 'CategorieenController@edit')->name('categories.edit');
Route::patch('/admin/categorieen/{category}/edit', 'CategorieenController@update')->name('categories.update');
Route::get('/admin/categorieen/new', 'CategorieenController@new')->name('categories.new');
Route::post('admin/categorieen/new', 'CategorieenController@insert')->name('categories.insert');
Route::delete('/admin/categorieen/{category}', 'CategorieenController@delete')->name('categories.delete');

Route::get('/foo', function (\Illuminate\Http\Request $request) {
//    $organizers = \App\User::whereHas('roles', function ($query) {
//        $query->where('slug', '=', 'organizer');
//    })->whereHas('company', function ($query) {
//        $query->where('accepted', '=', '0');
//    })->get();
//    return $organizers;
//dd(Illuminate\Support\Facades\Auth::user()->events);

//    echo Auth::user()->can("participant_action")?"ja":"nee";
    // $users = \App\User::whereHas('roles', function ($query) {
    //     $query->where('slug', '=', 'participant');
    // })->get();//Alle participants verkrijgen
    // return $users;
});

Route::get('nothingfishyhere', function(){
    return view('nothingfishyhere/eess');
})->name('nothingfishyhere');