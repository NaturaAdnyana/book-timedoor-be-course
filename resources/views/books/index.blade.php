@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <form method="GET" action="{{ route('books') }}">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="list_show" class="form-label">List shown:</label>
                <select name="list_show" id="list_show" class="form-select" onchange="this.form.submit()">
                    @for($i = 10; $i <= 100; $i +=10)
                        <option value="{{ $i }}" {{ $limit == $i ? 'selected' : '' }}>
                        {{ $i }}
                        </option>
                        @endfor
                </select>
            </div>
            <div class="col-md-6">
                <label for="search" class="form-label">Search:</label>
                <input type="text" name="search" id="search" class="form-control" value="{{ $search }}" placeholder="Enter book name or author" onchange="this.form.submit()">
            </div>
        </div>
    </form>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Book Name</th>
                <th scope="col">Category Name</th>
                <th scope="col">Author Name</th>
                <th scope="col">Average Rating</th>
                <th scope="col">Voter</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($books as $index => $book)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $book->name }}</td>
                <td>{{ $book->category_name }}</td>
                <td>{{ $book->author_name }}</td>
                <td>{{ number_format($book->average_rating, 2) }}</td>
                <td>{{ $book->total_voter }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No books found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4 w-100">
        {{ $books->appends(['list_show' => $limit, 'search' => $search])->links() }}
    </div>

    @if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
    @endif
</div>
@endsection