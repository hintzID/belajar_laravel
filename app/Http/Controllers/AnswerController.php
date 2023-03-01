<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function create(Question $question)
    {
        return view('answers.create', compact('question'));
    }

    public function store(Request $request, Question $question)
    {
        $validatedData = $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $answer = new Answer;
        $answer->text = $request->input('text');
        $answer->question()->associate($question);
        $answer->save();

        return redirect()->route('questions.index');
    }

    public function edit(Question $question, Answer $answer)
    {
        return view('answers.edit', compact('question', 'answer'));
    }

    public function update(Request $request, Question $question, Answer $answer)
    {
        $validatedData = $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $answer->text = $request->input('text');
        $answer->save();

        return redirect()->route('questions.index');
    }

    public function destroy(Question $question, Answer $answer)
    {
        $answer->delete();

        return redirect()->route('questions.index');
    }
}
