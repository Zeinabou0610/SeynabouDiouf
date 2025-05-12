<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Book $book)
{
    $validated = $request->validate([
        'rating' => 'required|integer|between:1,5',
        'comment' => 'required|string|max:1000',
        'user_id' => 'required|exists:users,id'
    ]);

    $book->reviews()->create($validated);

    return back()->with('success', 'Votre avis a été ajouté !');

}

public function edit(Review $review)
{
    $this->authorize('update', $review);
    
    return view('reviews.edit', compact('review'));
}

public function update(Request $request, Review $review)
{
    $this->authorize('update', $review);

    $validated = $request->validate([
        'rating' => 'required|integer|between:1,5',
        'comment' => 'required|string|max:500'
    ]);

    $review->update($validated);

    return redirect()->route('books.show', $review->book_id)
        ->with('success', 'Avis mis à jour !');
}
}
