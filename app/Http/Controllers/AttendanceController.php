<?php

namespace App\Http\Controllers;

use App\Attendance;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class AttendanceController extends Controller
{
    /**
     * Returns all attendances in the database.
     *
     * @return string    JSON
     */
    public function showAllAttendances()
    {
        return response()->json(Attendance::all());
    }

    /**
     * Returns a specific attendance.
     *
     * @param int        $sessionID
     * @param int        $userID
     *
     * @return string    JSON
     */
    public function showAttendance(int $sessionID, int $userID)
    {
        return response()->json(Attendance::where([['sessionID', '=', $sessionID], ['userID', '=', $userID]])->firstOrFail());
    }

    /**
     * Create a new attendance record.
     *
     * @param array      $request
     *
     * @return string    JSON
     */
    public function create(Request $request)
    {
        // Validate the user input to ensure safe data passed to the database.
        $this->validate($request, [
            'sessionID' => 'required|integer|exists:sessions,sessionID',
            'userID'    => 'required|integer|exists:users,userID',
            'userType'  => 'required|integer',
        ]);

        $attendance = Attendance::create($request->all());

        return response()->json($attendance, 201);
    }

    /**
     * Update an existing attendance record.
     *
     * @param int        $sessionID
     * @param int        $userID
     * @param array      $request
     *
     * @return string    JSON
     */
    public function update(int $sessionID, int $userID, Request $request)
    {
        // Validate the user input to ensure safe data passed to the database.
        $this->validate($request, [
            'userType' => 'required|integer',
        ]);

        $attendance = Attendance::where([['sessionID', '=', $sessionID], ['userID', '=', $userID]])->firstOrFail();
        $attendance->update($request->all());

        return response()->json($attendance, 200);
    }

    /**
     * Delete an attendance record.
     *
     * @param int         $sessionID
     * @param int         $userID
     *
     * @return respone    200
     */
    public function delete(int $sessionID, int $userID)
    {
        Attendance::where([['sessionID', '=', $sessionID], ['userID', '=', $userID]])->firstOrFail()->delete();
        return response('Attendance Deleted Successfully', 200);
    }

    /**
     * Return all attendances for a specific session.
     *
     * @param int         $sessionID
     *
     * @return string     JSON
     */
    public function showAttendancesBySession(int $sessionID)
    {
        return response()->json(Attendance::where('sessionID', $sessionID)->get());
    }

    /**
     * Return all attendances for a specific user.
     *
     * @param int         $userID
     *
     * @return string     JSON
     */
    public function showAttendancesByUser(int $userID)
    {
        return response()->json(Attendance::where('userID', $userID)->get());
    }
}
