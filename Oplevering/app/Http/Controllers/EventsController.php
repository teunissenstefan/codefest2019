<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GoVadisEvent;

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
        $events = GoVadisEvent::all();

        return view("events/myevents", ["events"=>$events]);
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
}
