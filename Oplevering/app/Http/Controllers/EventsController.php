<?php

namespace App\Http\Controllers;

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
        return redirect(route('events/myevents'));
    }
}
