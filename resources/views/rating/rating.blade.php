@extends ('layout')

@section('content')

<div class="container m-5 d-flex w-100 justify-content-lg-center flex-column">
    <h1>Rate Your Favorite Book</h1>
    <br>
    <form action="{{ route('rating.create') }}" method="get">
        <div>
            <label for="author">Author</label>
            <select class="form-select w-50" name="author_id" id="author_id" onchange="this.form.submit()">
                <option value="">Select Author</option>
                @foreach ($authors as $author)                        
                    <option value="{{ $author->id }}" {{ $getAuthor == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                @endforeach
            </select>
        </div>
    </form>
    @if (request('author_id'))
    <form action="{{ route('rating.store') }}" method="post">
        @csrf
        <div class="my-3">
            <label for="book">Book</label>
            <select class="form-select w-50" name="book_id" id="book">
                <option value="">Select Book</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}" {{ $getBook == $book->id ? 'selected' : '' }}>{{ $book->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="rating">Rating</label>
            <select class="form-select w-auto" name="rating" id="rating">
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>{{ $i }}</option>
                @endfor
            </select>
        </div>
        <button class="btn btn-outline-dark" type="submit">Submit</button>
    </form>
    @endif
</div>

@endsection
