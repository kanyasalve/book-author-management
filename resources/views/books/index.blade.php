@extends('layouts.app')

@section('content')
<h3>Books</h3>

<a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add Book</a>

<table class="table table-bordered">
<thead>
<tr>
    <th>Image</th>

    <th>Title</th>
    <th>Author</th>
    <th>Year</th>
    <th>Action</th>
</tr>
</thead>
<tbody>
@foreach($books as $book)
<tr>
    <td>
    @if($book->image)
        <img src="{{ asset('storage/books/' . $book->image) }}"
             width="60">
    @else
        No Image
    @endif
</td>

    <td>{{ $book->title }}</td>
    <td>{{ $book->author->name }}</td>
    <td>{{ $book->published_year }}</td>
    <td>
        <a href="{{ route('books.edit', $book->id) }}"
           class="btn btn-warning btn-sm">Edit</a>

        <form action="{{ route('books.destroy', $book->id) }}"
              method="POST"
              style="display:inline-block"
              onsubmit="return confirm('Delete this book?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
</table>
@endsection
