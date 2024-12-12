<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::select('authors.id', 'authors.name')
            ->selectRaw('COUNT(ratings.id) as total_voter')
            ->join('books', 'authors.id', '=', 'books.author_id')
            ->leftJoin('ratings', 'books.id', '=', 'ratings.book_id')
            ->where('ratings.rating', '>=', 5)
            ->groupBy('authors.id', 'authors.name')
            ->orderByDesc('total_voter')
            ->limit(10)
            ->get();

        return view('authors.index', compact('authors'));
    }
}
