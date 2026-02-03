@extends('layouts.app')

@section('content')
<h3>Edit Book</h3>

<form method="POST" action="{{ route('books.update', $book->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Author</label>
        <select name="author_id" class="form-control">
            @foreach($authors as $author)
                <option value="{{ $author->id }}"
                    {{ $book->author_id == $author->id ? 'selected' : '' }}>
                    {{ $author->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Book Title</label>
        <input type="text" name="title" class="form-control"
               value="{{ old('title', $book->title) }}">
        @error('title')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ old('description', $book->description) }}</textarea>
    </div>

    <div class="mb-3">
        <label>Published Year</label>
        <input type="number" name="published_year" class="form-control"
               value="{{ old('published_year', $book->published_year) }}">
    </div>

    @if($book->image)
    <div class="mb-3">
        <img src="{{ asset('storage/books/' . $book->image) }}"
             width="120" class="img-thumbnail">
    </div>
@endif

<div class="mb-3">
    <label>Change Image</label>
    <input type="file" name="image" class="form-control">
</div>


    <button class="btn btn-primary">Update</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
