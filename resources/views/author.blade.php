@extends('layout')

@section('title', 'Authors')

@section('content')
    
    <div class="container d-flex w-100 mt-5 justify-content-lg-center">
        <h1>Authors</h1>

        <hr>

        <table>
            <tr>
                <th>No</th>
                <th>Author Name</th>
                <th>Voters</th>
            </tr>
            @foreach ($authors as $index => $author)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->vote_count }}</td>
                </tr>
            @endforeach
        </table>

    </div>

@endsection
