@extends ('layout')

@section('content')

<div class="container d-flex w-100 mt-5 justify-content-lg-center">
    <h1>Rate Your Favorite Book</h1>
    <br>
    <div>
        <form action="{{ route('rating.create') }}" method="get">
            <label for="author">Author</label>
            <select name="author_id" id="author_id" onchange="this.form.submit()">
                <option value="">Select Author</option>
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </form>
    </div>

    <div>
        <form action="{{ route('rating.create') }}" method="get">
            <select name="book" id="book">
                <option value="">Select Book</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                @endforeach
            </select>
        </form>
    </div>
</div>

@endsection
