<?php

namespace App\Http\Controllers;

use App\Session;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class SessionController extends Controller
{  
    public function showAllSessions()
    {
        return response()->json(Session::all());
    }

    public function showSession($sessionID)
    {
        return response()->json(Session::findOrFail($sessionID));
    }

    public function create(Request $request)
    {
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

    public function update($sessionID, Request $request)
    {
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

    public function delete($sessionID)
    {
        Session::findOrFail($sessionID)->delete();
        return response('Session Deleted Successfully', 200);
    }
}
