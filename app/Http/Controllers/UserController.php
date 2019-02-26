<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showAllUsers()
    {
        return response()->json(User::all());
    }

    public function showUser($userID)
    {
        return response()->json(User::findOrFail($userID));
    }

    public function create(Request $request)
    {
        $user = User::create($request->all());

        return response()->json($user, 201);
    }

    public function update($userID, Request $request)
    {
        $user = User::findOrFail($userID);
        $user->update($request->all());

        return response()->json($user, 200);
    }

    public function delete($userID)
    {
        User::findOrFail($userID)->delete();
        return response('User Deleted Successfully', 200);
    }
}
