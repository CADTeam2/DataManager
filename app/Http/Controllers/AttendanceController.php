<?php

namespace App\Http\Controllers;

use App\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function showAllAttendances()
    {
        return response()->json(Attendance::all());
    }

    public function showAttendance($sessionID, $userID)
    {
        return response()->json(Attendance::where([['sessionID', '=', $sessionID], ['userID', '=', $userID]])->firstOrFail());
    }

    public function create(Request $request)
    {
        $attendance = Attendance::create($request->all());

        return response()->json($attendance, 201);
    }

    public function update($sessionID, $userID, Request $request)
    {
        $attendance = Attendance::where([['sessionID', '=', $sessionID], ['userID', '=', $userID]])->firstOrFail();
        $attendance->update($request->all());

        return response()->json($event, 200);
    }

    public function delete($sessionID, $userID)
    {
        Attendance::where([['sessionID', '=', $sessionID], ['userID', '=', $userID]])->firstOrFail()->delete();
        return response('Attendance Deleted Successfully', 200);
    }
}
