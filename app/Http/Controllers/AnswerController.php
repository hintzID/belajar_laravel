<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{

    public function index(Question $question)
    {
        $answers = Answer::with('question')->get();

    
        return view('answers.index', compact('question', 'answers'));
    }
    

    public function create()
    {
        $questions = Question::all();
        return view('answers.create', compact('questions'));
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'text' => 'required|string|max:255',
        ]);
    
        $answer = new Answer;
        $answer->text = $request->input('text');
        $answer->question_id = $request->input('question_id');
        $answer->save();
    
        return redirect()->route('answers.index');
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
    
        return redirect()->route('questions.index', $question->id);
    }
    
    public function destroy(Question $question, Answer $answer)
    {
        $answer->delete();
    
        return redirect()->route('questions.index', $question->id);
    }
    
}
