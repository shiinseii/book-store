<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rating;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $paging = $request->input('paging', 10);
        $query = $request->input('query', '');

        $books = Book::with(['author', 'category', 'rating'])
            ->where('name', 'like', '%' . $query . '%')
            ->orWhereHas('author', function ($s) use ($query) {
                $s->where('name', 'like', '%' . $query . '%');
            })
            ->withAvg('rating', 'rating')
            ->withCount('rating', 'rating')
            ->orderBy('rating_count', 'desc')   
            ->orderBy('rating_avg_rating', 'desc')
            ->paginate($paging);

        return view('index', compact('books', 'paging', 'query'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
