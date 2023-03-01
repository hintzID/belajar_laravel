<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();

        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $question = new Question();
        $question->number = $request->input('number');
        $question->text = $request->input('text');
        $question->answer1 = $request->input('answer1');
        $question->answer2 = $request->input('answer2');
        $question->answer3 = $request->input('answer3');
        $question->answer4 = $request->input('answer4');
        $question->save();

        return redirect()->route('questions.index');
    }

    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, Question $question)
    {
        $question->number = $request->input('number');
        $question->text = $request->input('text');
        $question->answer1 = $request->input('answer1');
        $question->answer2 = $request->input('answer2');
        $question->answer3 = $request->input('answer3');
        $question->answer4 = $request->input('answer4');
        $question->save();

        return redirect()->route('questions.index');
    }

    public function destroy(Question $question)
    {
        $question->delete();

        return redirect()->route('questions.index');
    }
}

