<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Session;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class SessionController extends Controller
{
    /**
     * Returns all sessions in the database.
     *
     * @return string    JSON
     */
    public function showAllSessions()
    {
        return response()->json(Session::all());
    }

    /**
     * Returns a specific session.
     *
     * @param int        $sessionID
     *
     * @return string    JSON
     */
    public function showSession(int $sessionID)
    {
        return response()->json(Session::findOrFail($sessionID));
    }

    /**
     * Create a new session.
     *
     * @param array      $request
     *
     * @return string    JSON
     */
    public function create(Request $request)
    {
        // Validate the user input to ensure safe data passed to the database.
        $this->validate($request, [
            'eventID'            => 'required|integer|exists:sessions,sessionID',
            'sessionName'        => 'required|string|max:255',
            'startTime'          => 'nullable|date',
            'endTime'            => 'nullable|date|after:start_date',
            'acceptingQuestions' => 'integer|min:0|max:5',
            'roomName'           => 'nullable|string|max:255',
            'speaker'            => 'nullable|string|max:255',
        ]);

        $session = Session::create($request->all());

        return response()->json($session, 201);
    }

    /**
     * Update an existing session.
     *
     * @param int        $sessionID
     * @param array      $request
     *
     * @return string    JSON
     */
    public function update(int $sessionID, Request $request)
    {
        // Validate the user input to ensure safe data passed to the database.
        $this->validate($request, [
            'sessionName'        => 'string|max:255',
            'startTime'          => 'nullable|date',
            'endTime'            => 'nullable|date|after:start_date',
            'acceptingQuestions' => 'integer|min:0|max:5',
            'roomName'           => 'nullable|string|max:255',
            'speaker'            => 'nullable|string|max:255',
        ]);

        $session = Session::findOrFail($sessionID);
        $session->update($request->all());

        return response()->json($session, 200);
    }

    /**
     * Delete a session.
     *
     * @param int         $sessionID
     *
     * @return respone    200
     */
    public function delete(int $sessionID)
    {
        Session::findOrFail($sessionID)->delete();
        return response('Session Deleted Successfully', 200);
    }

    /**
     * Return all sessions attended by a specific user.
     *
     * @param int        $userID
     *
     * @return string    JSON
     */
    public function showSessionsByUser(int $userID)
    {
        $attendances = Attendance::where('userID', $userID)->get();

        return response()->json(Session::wherein('sessionID', $attendances->pluck('sessionID'))->get());
    }

    /**
     * Return all sessions at a specific event.
     *
     * @param int        $eventID
     *
     * @return string    JSON
     */
    public function showSessionsByEvent(int $eventID)
    {
        return response()->json(Session::where('eventID', $eventID)->get());
    }
}
