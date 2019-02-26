<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function showAllEvents()
    {
        return response()->json(Event::all());
    }

    public function showEvent($eventID)
    {
        return response()->json(Event::findOrFail($eventID));
    }

    public function create(Request $request)
    {
        $event = Event::create($request->all());

        return response()->json($event, 201);
    }

    public function update($eventID, Request $request)
    {
        $event = Event::findOrFail($eventID);
        $event->update($request->all());

        return response()->json($event, 200);
    }

    public function delete($eventID)
    {
        Event::findOrFail($eventID)->delete();
        return response('Event Deleted Successfully', 200);
    }
}
