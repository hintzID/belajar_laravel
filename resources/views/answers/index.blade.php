@extends('layouts.admin')

@section('content')

@section('title', 'Kunci Jawaban')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Answer List') }}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('No') }}</th>
                                    <th scope="col">{{ __('Soal') }}</th>
                                    <th scope="col">{{ __('Jawaban') }}</th>
                                    <th scope="col">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($answers as $answer)
  <tr>
    <td>{{ $answer->question->number }}</td>
    <td>{{ $answer->question->text }}</td>
    <td>{{ $answer->text }}</td>
    <td>
      <a href="{{ route('answers.edit', [$answer->question, $answer]) }}" class="btn btn-primary">{{ __('Edit') }}</a>
      <form action="{{ route('answers.destroy', $answer->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">{{ __('delete') }}</button>
    </form>
    
    </td>
  </tr>
@endforeach

                            </tbody>
                        </table>
                        <div class="mt-4">
                            <a href="{{ route('questions.index') }}" class="btn btn-secondary">{{ __('Back to Question List') }}</a>
                            <a href="{{ route('answers.create', $question) }}" class="btn btn-primary">{{ __('Add Answer') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
