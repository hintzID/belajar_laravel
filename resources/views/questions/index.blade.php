@extends('layouts.admin')

@section('content')

    <h2>Questions</h2>

    <table>
        <tbody>
        @foreach ($questions as $question)
    <div class="container bg-warning">
        <p>{{ $question->number }}. {{ $question->text }}</p>
        <label><input type="radio" name="answer{{ $question->id }}" value="answer1">{{ $question->answer1 }}</label>
        <label><input type="radio" name="answer{{ $question->id }}" value="answer2">{{ $question->answer2 }}</label>
        <label><input type="radio" name="answer{{ $question->id }}" value="answer3">{{ $question->answer3 }}</label>
        <label><input type="radio" name="answer{{ $question->id }}" value="answer4">{{ $question->answer4 }}</label>
    </div>
    <br>
@endforeach

        </tbody>
    </table>

@endsection
