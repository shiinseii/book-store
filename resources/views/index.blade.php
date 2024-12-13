@extends('layout')

@section('title', 'Books')

@section('content')

<div class="container py-3 px-5">
    <h1>Books</h1>
    <hr>
    <div>
        <div>
            <form action="{{ route('index') }}" method="get">
                <label for="query">Search</label>
                <div class="d-flex gap-3">
                    <input class="form-control" type="text" name="query" id="query" value="{{ $query }}"/>
                    <input class="btn btn-outline-dark" type="submit" value="search" />
                </div>
            </form>
        </div>
        <div class="p-3">
            <form action="{{ route('index') }}" method="get">
                <label for="paging">Item Per Page</label>
                <input type="text" name="query" id="query" value="{{ $query }}" hidden/>
                <select class="rounded-3 ms-3" name="paging" id="paging" onchange="this.form.submit()">
                    @for ($i = 10; $i <= 100; $i += 10)
                        <option value="{{ $i }}" {{ $paging == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </form>
        </div>
        <table class="table">
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
                        {{ $books->firstItem() + $index }}
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
    <div class="justify-content-center my-4">
        {{ $books->appends(['paging' => request('paging')])->links() }}
    </div>
</div>

@endsection
