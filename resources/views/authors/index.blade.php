@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">Top 10 Most Famous Authors</h1>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Author Name</th>
                <th scope="col">Voters</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($authors as $index => $author)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $author->name }}</td>
                <td>{{ $author->total_voter }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">No authors found</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
