<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\User;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class UserController extends Controller
{
    /**
     * Returns all users in the database.
     *
     * @return string    JSON
     */
    public function showAllUsers()
    {
        return response()->json(User::all());
    }

    /**
     * Returns a specific user.
     *
     * @param int        $userID
     *
     * @return string    JSON
     */
    public function showUser(int $userID)
    {
        return response()->json(User::findOrFail($userID));
    }

    /**
     * Create a new user.
     *
     * @param array      $request
     *
     * @return string    JSON
     */
    public function create(Request $request)
    {
        // Validate the user input to ensure safe data passed to the database.
        $this->validate($request, [
            'username'  => 'required|string|max:255|unique:users,username',
            'password'  => 'required|string|max:255',
            'title'     => 'required|string|max:255',
            'firstName' => 'required|string|max:255',
            'lastName'  => 'required|string|max:255',
            'contactNo' => 'nullable|string|email|max:255|unique:users,contactNo',
            'email'     => 'required|string|email|max:255|unique:users,email',
        ]);

        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    /**
     * Update an existing user.
     *
     * @param int        $userID
     * @param array      $request
     *
     * @return string    JSON
     */
    public function update(int $userID, Request $request)
    {
        // Validate the user input to ensure safe data passed to the database.
        $this->validate($request, [
            'username'  => 'string|max:255|unique:users,username',
            'password'  => 'string|max:255',
            'title'     => 'string|max:255',
            'firstName' => 'string|max:255',
            'lastName'  => 'string|max:255',
            'contactNo' => 'nullable|string|email|max:255|unique:users,contactNo',
            'email'     => 'string|email|max:255|unique:users,email',
        ]);

        $user = User::findOrFail($userID);
        $user->update($request->all());

        return response()->json($user, 200);
    }

    /**
     * Delete a user.
     *
     * @param int         $userID
     *
     * @return respone    200
     */
    public function delete(int $userID)
    {
        User::findOrFail($userID)->delete();
        return response('User Deleted Successfully', 200);
    }

    /**
     * Return all users attending a specific session.
     *
     * @param int        $sessionID
     *
     * @return string    JSON
     */
    public function showUsersBySession(int $sessionID)
    {
        $attendances = Attendance::where('sessionID', $sessionID)->get();

        return response()->json(User::wherein('userID', $attendances->pluck('userID'))->get());
    }
}
