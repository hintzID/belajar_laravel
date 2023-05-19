@extends('layouts.admin')

@section('content')
<style>
    
</style>
    <h2>Questions</h2>
    <a href="{{ route('questions.create') }}" class="btn btn-primary">Create New Question</a>
    <br><br>
    <table class="">
        <tbody>
        @foreach ($questions as $question)
    <div class="container bg-warning rounded">
        <p>{{ $question->number }}. {{ $question->text }}</p>
        <label><input type="radio" name="answer{{ $question->id }}" value="answer1"> {{ $question->answer1 }}</label><br>
        <label><input type="radio" name="answer{{ $question->id }}" value="answer2"> {{ $question->answer2 }}</label><br>
        <label><input type="radio" name="answer{{ $question->id }}" value="answer3"> {{ $question->answer3 }}</label><br>
        <label><input type="radio" name="answer{{ $question->id }}" value="answer4"> {{ $question->answer4 }}</label><br>
    </div>
    <br>
@endforeach

        </tbody>
    </table>

@endsection
