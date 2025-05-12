<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::withCount('reviews')
                   ->withAvg('reviews', 'rating')
                   ->paginate(10);

        return view('books.index', compact('books'));
    }

    /**
     * Affiche le formulaire de création
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Stocke un nouveau livre
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'published_at' => 'nullable|date'
        ]);

        Book::create($validated);

        return redirect()->route('books.index')
            ->with('success', 'Livre créé avec succès!');
    }

    /**
     * Affiche un livre spécifique
     */
    public function show(Book $book)
    {
        return view('books.show', [
            'book' => $book->load('reviews.user')
        ]);
    }

    
}