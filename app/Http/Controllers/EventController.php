<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class EventController extends Controller
{
	public function showAllEvents()
	{
		return response()->json(Event::all());
	}

	public function showEvent(int $eventID)
	{
		return response()->json(Event::findOrFail($eventID));
	}

	public function create(Request $request)
	{
		$this->validate($request, [
			'userID'	=> 'required|integer|exists:users,userID',
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

	public function update(int $eventID, Request $request)
	{
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

	public function delete(int $eventID)
	{
		Event::findOrFail($eventID)->delete();
		return response('Event Deleted Successfully', 200);
	}

	public function showEventsByUser(int $userID)
	{
		return response()->json(Event::where('userID', $userID)->get());
	}
}
