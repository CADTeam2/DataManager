<?php

namespace App\Http\Controllers;

use App\Session;
use Illuminate\Http\Request;

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
        $session = Session::create($request->all());

        return response()->json($session, 201);
    }

    public function update($sessionID, Request $request)
    {
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
