<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group([
    'prefix'     => 'api',
    //'middleware' => 'auth',
], function() use ($router) {

// User API Routes:
    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/users
    // HTTP Method: GET
    // Gets all users.
    $router->get('users', [
        'uses' => 'UserController@showAllUsers',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/users/session/{sessionID}
    // HTTP Method: GET
    // Gets all users that are attending a specific session.
    $router->get('users/session/{sessionID}', [
        'uses' => 'UserController@showUsersBySession',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/users/{userID}
    // HTTP Method: GET
    // Gets a specific user.
    $router->get('users/{userID}', [
        'uses' => 'UserController@showUser',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/users
    // HTTP Method: POST
    // Creates a new user.
    $router->post('users', [
        'uses' => 'UserController@create',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/users/{userID}
    // HTTP Method: DELETE
    // Deletes a user.
    $router->delete('users/{userID}', [
        'uses' => 'UserController@delete',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/users/{userID}
    // HTTP Method: PUT
    // Updates an existing user.
    $router->put('users/{userID}', [
        'uses' => 'UserController@update',
    ]);

// Event API Routes:
    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/events
    // HTTP Method: GET
    // Gets all events.
    $router->get('events', [
        'uses' => 'EventController@showAllEvents',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/events/user/{userID}
    // HTTP Method: GET
    // Gets all events that are owned by a specific user.
    $router->get('events/user/{userID}', [
        'uses' => 'EventController@showEventsByUser',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/events/{eventID}
    // HTTP Method: GET
    // Gets a specific event.
    $router->get('events/{eventID}', [
        'uses' => 'EventController@showEvent',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/events
    // HTTP Method: POST
    // Creates a new event.
    $router->post('events', [
        'uses' => 'EventController@create',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/events/{eventID}
    // HTTP Method: DELETE
    // Deletes an event.
    $router->delete('events/{eventID}', [
        'uses' => 'EventController@delete',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/events/{eventID}
    // HTTP Method: PUT
    // Updates an existing event.
    $router->put('events/{eventID}', [
        'uses' => 'EventController@update',
    ]);

// Session API Routes:
    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/sessions
    // HTTP Method: GET
    // Gets all sessions.
    $router->get('sessions', [
        'uses' => 'SessionController@showAllSessions',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/sessions/user/{userID}
    // HTTP Method: GET
    // Gets all sessions that are attended by a specific user.
    $router->get('sessions/user/{userID}', [
        'uses' => 'SessionController@showSessionsByUser',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/sessions/event/{eventID}
    // HTTP Method: GET
    // Gets all sessions that are part of a specific event.
    $router->get('sessions/event/{eventID}', [
        'uses' => 'SessionController@showSessionsByEvent',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/sessions/{sessionID}
    // HTTP Method: GET
    // Shows a specific session.
    $router->get('sessions/{sessionID}', [
        'uses' => 'SessionController@showSession',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/sessions
    // HTTP Method: POST
    // Creates a new session.
    $router->post('sessions', [
        'uses' => 'SessionController@create',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/sessions/{sessionID}
    // HTTP Method: DELETE
    // Deletes a session.
    $router->delete('sessions/{sessionID}', [
        'uses' => 'SessionController@delete',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/sessions/{sessionID}
    // HTTP Method: PUT
    // Updates a session.
    $router->put('sessions/{sessionID}', [
        'uses' => 'SessionController@update',
    ]);

// Questions API Routes:
    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/questions
    // HTTP Method: GET
    // Gets all questions.
    $router->get('questions', [
        'uses' => 'QuestionController@showAllQuestions',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/questions/session/{sessionID}
    // HTTP Method: GET
    // Gets all questions for a specific session.
    $router->get('questions/session/{sessionID}', [
        'uses' => 'QuestionController@showQuestionsBySession',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/questions/user/{userID}
    // HTTP Method: GET
    // Gets all questions asked by a specific user.
    $router->get('questions/user/{userID}', [
        'uses' => 'QuestionController@showQuestionsByUser',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/questions/{questionID}
    // HTTP Method: GET
    // Gets a specific question.
    $router->get('questions/{questionID}', [
        'uses' => 'QuestionController@showQuestion',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/
    // HTTP Method: POST
    // Creates a new question.
    $router->post('questions', [
        'uses' => 'QuestionController@create',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/questions/{questionID}
    // HTTP Method: DELETE
    // Deletes a question.
    $router->delete('questions/{questionID}', [
        'uses' => 'QuestionController@delete',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/questions/{questionID}
    // HTTP Method: PUT
    // Updates an existing question.
    $router->put('questions/{questionID}', [
        'uses' => 'QuestionController@update',
    ]);

// Attendance API Routes:
    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/attendances 
    // HTTP Method: GET
    // Gets all attendances.
    $router->get('attendances', [
        'uses' => 'AttendanceController@showAllAttendances',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/attendances/session/{sessionID}
    // HTTP Method: GET
    // Gets all attendances for a specific session.
    $router->get('attendances/session/{sessionID}', [
        'uses' => 'AttendanceController@showAttendancesBySession',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/attendances/user/{userID}
    // HTTP Method: GET
    // Gets all attendances for a specific user.
    $router->get('attendances/user/{userID}', [
        'uses' => 'AttendanceController@showAttendancesByUser',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/attendances/{sessionID}/{userID}
    // HTTP Method: GET
    // Gets a specific attendance.
    $router->get('attendances/{sessionID}/{userID}', [
        'uses' => 'AttendanceController@showAttendance',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/attendances
    // HTTP Method: POST
    // Creates a new attendance.
    $router->post('attendances', [
        'uses' => 'AttendanceController@create',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/attendances/{sessionID}/{userID}
    // HTTP Method: DELETE
    // Deletes an attendance.
    $router->delete('attendances/{sessionID}/{userID}', [
        'uses' => 'AttendanceController@delete',
    ]);

    // Route:       https://cadgroup2.jdrcomputers.co.uk/api/attendances/{sessionID}/{userID}
    // HTTP Method: PUT
    // Updates an existing attendance.
    $router->put('attendances/{sessionID}/{userID}', [
        'uses' => 'AttendanceController@update',
    ]);
});
