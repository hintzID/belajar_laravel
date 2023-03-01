@extends('layouts.admin')

@section('content')

    <h2>Questions</h2>
    <a href="{{ route('questions.create') }}" class="btn btn-primary">Create New Question</a>
    <table>
        <tbody>
        @foreach ($questions as $question)
    <div class="container bg-warning">
        <p>{{ $question->number }}. {{ $question->text }}</p>
        <label><input type="radio" name="answer{{ $question->id }}" value="answer1"> A. {{ $question->answer1 }}</label>
        <label><input type="radio" name="answer{{ $question->id }}" value="answer2"> B. {{ $question->answer2 }}</label>
        <label><input type="radio" name="answer{{ $question->id }}" value="answer3"> C. {{ $question->answer3 }}</label>
        <label><input type="radio" name="answer{{ $question->id }}" value="answer4"> D. {{ $question->answer4 }}</label>
    </div>
    <br>
@endforeach

        </tbody>
    </table>

@endsection
