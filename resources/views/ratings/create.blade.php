@extends('layouts.app')
@section('content')

<div class="w-50 mx-auto mt-4">
    <h1 class="mb-4 text-center">Insert Rating</h1>

    <form method="GET" action="{{ route('ratings.create') }}" class="needs-validation" novalidate>
        <div class="mb-3">
            <label for="author_id" class="form-label">Book Author:</label>
            <select name="author_id" id="author_id" class="form-select" onchange="this.form.submit()">
                <option value="">-- Select Author --</option>
                @foreach($authors as $author)
                <option value="{{ $author->id }}" {{ request('author_id') == $author->id ? 'selected' : '' }}>
                    {{ $author->name }}
                </option>
                @endforeach
            </select>
            @error('author_id')
            <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
    </form>

    @if(request('author_id'))
    <form method="POST" action="{{ route('ratings.store') }}" class="needs-validation" novalidate>
        @csrf
        <input type="hidden" name="author_id" value="{{ request('author_id') }}">

        <div class="mb-3">
            <label for="book_id" class="form-label">Book Name:</label>
            <select name="book_id" id="book_id" class="form-select" required>
                <option value="">-- Select Book --</option>
                @foreach($books as $book)
                @if($book->author_id == request('author_id'))
                <option value="{{ $book->id }}">{{ $book->name }}</option>
                @endif
                @endforeach
            </select>
            @error('book_id')
            <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating:</label>
            <select name="rating" id="rating" class="form-select" required>
                @for($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
            </select>
            @error('rating')
            <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-dark w-100">Submit</button>
    </form>
    @endif
</div>

@endsection