<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Rating;

class RatingController extends Controller
{
    public function create(Request $request)
    {
        $authors = Author::all();
        $books = [];

        if ($request->author_id) {
            $books = Book::where('author_id', $request->author_id)->get();
        }

        return view('ratings.create', compact('authors', 'books', 'request'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'rating' => 'required|integer|min:1|max:10',
        ]);

        Rating::create([
            'book_id' => $request->input('book_id'),
            'rating' => $request->input('rating'),
        ]);

        return redirect()->route('books')->with('success', 'Sukses menambahkan rating.');
    }
}
