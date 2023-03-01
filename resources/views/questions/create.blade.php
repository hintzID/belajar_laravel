@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Create New Question</h2>
                <form action="{{ route('questions.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="number">Question Number</label>
                        <input type="text" name="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="text">Question Text</label>
                        <textarea name="text" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="answer1">Answer 1</label>
                        <input type="text" name="answer1" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="answer2">Answer 2</label>
                        <input type="text" name="answer2" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="answer3">Answer 3</label>
                        <input type="text" name="answer3" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="answer4">Answer 4</label>
                        <input type="text" name="answer4" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
