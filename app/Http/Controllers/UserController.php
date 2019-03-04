<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

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

    public function update($userID, Request $request)
    {
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

    public function delete($userID)
    {
        User::findOrFail($userID)->delete();
        return response('User Deleted Successfully', 200);
    }
}
