<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function showAllQuestions()
    {
        return response()->json(Question::all());
    }

    public function showQuestion($questionID)
    {
        return response()->json(Question::findOrFail($questionID));
    }

    public function create(Request $request)
    {
        $question = Question::create($request->all());

        return response()->json($question, 201);
    }

    public function update($questionID, Request $request)
    {
        $question = Question::findOrFail($questionID);
        $question->update($request->all());

        return response()->json($question, 200);
    }

    public function delete($questionID)
    {
        Question::findOrFail($questionID)->delete();
        return response('Question Deleted Successfully', 200);
    }
}
