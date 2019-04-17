<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\GoVadisEvent;
use App\UserEvents;
use Illuminate\Support\Facades\Auth;

class EventsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function myEvents()
    {
        $events = Auth::user()->events;
        $finishedEvents = $events->where('finished',1);
        $openEvents = $events->where('finished',0);

        return view("events/myevents", ["finishedEvents"=>$finishedEvents,"openEvents"=>$openEvents]);
    }

    public function index()
    {
        $events = GoVadisEvent::all();
        $data = [
            'events' => $events
        ];
        return view('events.index')->with($data);
    }

    public function events()
    {
        $events = GoVadisEvent::all();

        return view("events/events", ["events"=>$events]);
    }

    public function event(GoVadisEvent $eventId)
    {
        return view("events/event", ["event"=>$eventId]);
    }

    public function remove(GoVadisEvent $event, Request $request)
    {
        $event->delete();
        $request->session()->flash('status', 'Event verwijderd!');
        return redirect(route('myevents'));
    }

    public function addEvent()
    {
        $events = GoVadisEvent::all();
        if(Auth::User()->can('organizer_action') == true){
            return view("events/addevent");
        }
        elseif(Auth::User()->can('admin_action') == true){
            return view("events/addevent");
        }
        else {
            return view("events/events", ["events"=>$events]);
        }
    }

    public function eventStore(GoVadisEvent $goVadisEvent, Request $request)
    {
        $goVadisEvent->fill($request->all());
        $goVadisEvent->orginazor = Auth::user()->id;
        $goVadisEvent->signed_up = 0;
        $goVadisEvent->finished = 0;
        $goVadisEvent->place_points = 'na';
        $goVadisEvent->save();
        $request->session()->flash('status', 'Event toegevoegd!');
        return redirect(route('events.index'));
    }

    public function eventEdit(GoVadisEvent $eventId)
    {
        return view("events/eventedit", ["event"=>$eventId]);
    }

    public function eventSign(GoVadisEvent $eventId, Request $request)
    {
        $events = GoVadisEvent::find($eventId['id']);
        $user = Auth::user();
        $user->events()->attach($events);
        $request->session()->flash('status', 'Aangemeld!');
        return redirect(route('event', ["event"=>$eventId['id']]));
    }

    public function new()
    {
        $categories = GoVadisEvent::all();
        if(Auth::User()->can('organizer_action') == true){
            $data = [
                'categories' => Category::pluck('category','id')
            ];
            return view("events/new")->with($data);
        }
        elseif(Auth::User()->can('admin_action') == true){
            $data = [
                'categories' => Category::pluck('category','id')
            ];
            return view("events/new")->with($data);
        }
        else {
            return view("events/events", ["events"=>$categories]);
        }
    }
}
