<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $limit = $request->input('list_show', 10);
        $search = $request->input('search', '');

        $books = Book::with(['category:id,name', 'author:id,name'])
            ->select(
                'books.id',
                'books.name',
                'categories.name as category_name',
                'authors.name as author_name',
                DB::raw('AVG(ratings.rating) as average_rating'),
                DB::raw('COUNT(ratings.id) as total_voter')
            )
            ->join('categories', 'books.category_id', '=', 'categories.id')
            ->join('authors', 'books.author_id', '=', 'authors.id')
            ->leftJoin('ratings', 'books.id', '=', 'ratings.book_id')
            ->when($search, function ($query, $search) {
                return $query->where('books.name', 'like', "%{$search}%")
                    ->orWhere('authors.name', 'like', "%{$search}%");
            })
            ->groupBy('books.id', 'books.name')
            ->orderBy('average_rating', 'desc')
            ->paginate($limit);

        return view('books.index', compact('books', 'limit', 'search'));
    }
}
