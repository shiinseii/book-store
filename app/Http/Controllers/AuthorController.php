<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $authors = Author::withCount(['book', 'ratings as vote_count' => function ($q) {
            $q->where('rating', '>', 5);
        }])
        ->orderByDesc('vote_count')
        ->paginate(10);

    return view('author', compact('authors'));
    }
}
