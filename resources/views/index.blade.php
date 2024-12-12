@extends('layout')

@section('title', 'Books')

@section('content')

<div>
    <h1>Books</h1>
    <div>
        
        <div>
            <form action="{{ route('index') }}" method="get">
                <label for="query">Search</label>
                <input type="text" name="query" id="query" value="{{ $query }}"/>
                <input type="submit" value="search" />
            </form>
        </div>
        <div>
            <form action="{{ route('index') }}" method="get">
                <label for="paging">Item Per Page</label>
                <input type="text" name="query" id="query" value="{{ $query }}" hidden/>
                <select name="paging" id="paging" onchange="this.form.submit()">
                    @for ($i = 10; $i <= 100; $i += 10)
                        <option value="{{ $i }}" {{ $paging == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </form>
        </div>
        <hr>
        <table border="1">
            <thead>
                <tr>
                    <th>
                        No
                    </th>
                    <th>
                        Book Title
                    </th>
                    <th>
                        Author
                    </th>
                    <th>
                        Category
                    </th>
                    <th>
                        Rating
                    </th>
                    <th>
                        Votes
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $index => $book)
                <tr>
                    <td>
                        {{ $index + 1 }}
                    </td>
                    <td>
                        {{ $book->name }}
                    </td>
                    <td>
                        {{ $book->author->name }}
                    </td>
                    <td>
                        {{ $book->category->name }}
                    </td>
                    <td>
                        {{ number_format($book->rating_avg_rating, 2) }}
                    </td>
                    <td>
                        {{ $book->rating_count }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
