<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class EventController extends Controller
{
    /**
     * Returns all events in the database.
     *
     * @return string    JSON
     */
    public function showAllEvents()
    {
        return response()->json(Event::all());
    }

    /**
     * Returns a specific event.
     *
     * @param int        $eventID
     *
     * @return string    JSON
     */
    public function showEvent(int $eventID)
    {
        return response()->json(Event::findOrFail($eventID));
    }

    /**
     * Create a new event.
     *
     * @param array      $request
     *
     * @return string    JSON
     */
    public function create(Request $request)
    {
        // Validate the user input to ensure safe data passed to the database.
        $this->validate($request, [
            'userID'    => 'required|integer|exists:users,userID',
            'eventName' => 'required|string|max:255',
            'street'    => 'nullable|string|max:255',
            'city'      => 'nullable|string|max:255',
            'postcode'  => 'nullable|string|max:255',
            'contactNo' => 'nullable|string|max:255',
            'email'     => 'nullable|string|email|max:255',
        ]);

        $event = Event::create($request->all());

        return response()->json($event, 201);
    }

    /**
     * Update an existing event record.
     *
     * @param int        $eventID
     * @param array      $request
     *
     * @return string    JSON
     */
    public function update(int $eventID, Request $request)
    {
        // Validate the user input to ensure safe data passed to the database.
        $this->validate($request, [
            'eventName' => 'string|max:255',
            'street'    => 'nullable|string|max:255',
            'city'      => 'nullable|string|max:255',
            'postcode'  => 'nullable|string|max:255',
            'contactNo' => 'nullable|string|max:255',
            'email'     => 'nullable|string|email|max:255',
        ]);

        $event = Event::findOrFail($eventID);
        $event->update($request->all());

        return response()->json($event, 200);
    }

    /**
     * Delete an event.
     *
     * @param int         $eventID
     *
     * @return respone    200
     */
    public function delete(int $eventID)
    {
        Event::findOrFail($eventID)->delete();
        return response('Event Deleted Successfully', 200);
    }

    /**
     * Return all events owned by a specific user.
     *
     * @param int        $userID
     *
     * @return string    JSON
     */
    public function showEventsByUser(int $userID)
    {
        return response()->json(Event::where('userID', $userID)->get());
    }
}
