<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function book()
    {
        return $this->hasMany(Book::class);
    }

    public function getTotalVotesAttribute()
    {
        return $this->ratings()->sum('vote_count');
    }

    public function ratings()
    {
        return $this->hasManyThrough(Rating::class, Book::class, 'author_id', 'book_id', 'id', 'id');
    }
}
