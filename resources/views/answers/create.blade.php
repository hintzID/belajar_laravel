@extends('layouts.admin')

@section('title', 'Buat Kunci Jawaban')

@section('content')
    <div class="container">
        <h1>Create Answer</h1>
        <form action="{{ route('answers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="question_id">Question</label>
                <select name="question_id" id="question_id" class="form-control @error('question_id') is-invalid @enderror">
                    <option value="">-- Choose Question --</option>
                    @php $counter = 1; @endphp
                    @foreach($questions as $question)
                        <option value="{{ $question->id }}" {{ old('question_id') == $question->id ? 'selected' : '' }}>
                            {{ $counter++ }}. {{ $question->title }}
                        </option>
                    @endforeach
                </select>
                @error('question_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="text">Answer Text</label>
                <input type="text" name="text" class="form-control @error('text') is-invalid @enderror"
                       value="{{ old('text') }}" required>
                @error('text')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
