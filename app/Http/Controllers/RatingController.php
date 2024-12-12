<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create(Request $request)
    {
        $authors = Author::orderBy('name')->get();
        $getAuthor = $request->input('author_id');
        $books = Book::where('author_id', $request->author_id)->get();

        return view('rating.rating', compact('authors', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required',
            'rating' => 'required|numeric',
        ]);

        $rating = Rating::create([
            'book_id' => $request->book_id,
            'rating' => $request->rating
        ]);

        if ($rating) {
            return redirect()->route('/')->with('success', 'Rating created successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to create rating!');
        }
    }
}
