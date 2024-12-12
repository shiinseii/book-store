@extends ('layout')

@section('content')

<div class="container d-flex w-100 mt-5 justify-content-lg-center">
    <h1>Rate Your Favorite Book</h1>
    <br>
    <form action="{{ route('rating.create') }}" method="get">
        <div>
            <label for="author">Author</label>
            <select name="author_id" id="author_id" onchange="this.form.submit()">
                <option value="">Select Author</option>
                @foreach ($authors as $author)                        
                    <option value="{{ $author->id }}" {{ $getAuthor == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                @endforeach
            </select>
        </div>
    </form>
        <br>
        @if (request('author_id'))

        <form action="{{ route('rating.store') }}" method="post">
            @csrf
            <label for="book">Book</label>
            <select name="book_id" id="book">
                <option value="">Select Book</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}" {{ $getBook == $book->id ? 'selected' : '' }}>{{ $book->name }}</option>
                @endforeach
            </select>
            <div>
                <label for="rating">Rating</label>
                <select name="rating" id="rating">
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <button type="submit">Submit</button>
        </form>
        @endif
</div>

@endsection
