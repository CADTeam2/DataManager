<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller;

class QuestionController extends Controller
{
    /**
     * Returns all questions in the database.
     *
     * @return string    JSON
     */
    public function showAllQuestions()
    {
        return response()->json(Question::all());
    }

    /**
     * Returns a specific question.
     *
     * @param int        $questionID
     *
     * @return string    JSON
     */
    public function showQuestion(int $questionID)
    {
        return response()->json(Question::findOrFail($questionID));
    }

    /**
     * Create a new question.
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
            'question'  => 'required|string',
            'priority'  => 'integer|min:0|max:5',
        ]);

        $question = Question::create($request->all());

        return response()->json($question, 201);
    }

    /**
     * Update an existing question.
     *
     * @param int        $questionID
     * @param array      $request
     *
     * @return string    JSON
     */
    public function update(int $questionID, Request $request)
    {
        // Validate the user input to ensure safe data passed to the database.
        $this->validate($request, [
            'question' => 'string',
            'priority' => 'integer|min:0|max:5',
        ]);

        $question = Question::findOrFail($questionID);
        $question->update($request->all());

        return response()->json($question, 200);
    }

    /**
     * Delete a question.
     *
     * @param int         $questionID
     *
     * @return respone    200
     */
    public function delete(int $questionID)
    {
        Question::findOrFail($questionID)->delete();
        return response('Question Deleted Successfully', 200);
    }

    /**
     * Return all questions for a specific session.
     *
     * @param int        $sessionID
     *
     * @return string    JSON
     */
    public function showQuestionsBySession(int $sessionID)
    {
        return response()->json(Question::where('sessionID', $sessionID)->get());
    }

    /**
     * Return all questions by a specific user.
     *
     * @param int        $userID
     *
     * @return string    JSON
     */
    public function showQuestionsByUser(int $userID)
    {
        return response()->json(Question::where('userID', $userID)->get());
    }
}
