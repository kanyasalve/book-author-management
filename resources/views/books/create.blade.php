@extends('layouts.app')

@section('content')
<h3>Add Book</h3>

<form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label>Author</label>
        <select name="author_id" class="form-control">
            <option value="">-- Select Author --</option>
            @foreach($authors as $author)
                <option value="{{ $author->id }}">
                    {{ $author->name }}
                </option>
            @endforeach
        </select>
        @error('author_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label>Book Title</label>
        <input type="text" name="title" class="form-control"
               value="{{ old('title') }}">
        @error('title')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
        <label>Published Year</label>
        <input type="number" name="published_year" class="form-control"
               value="{{ old('published_year') }}">
        @error('published_year')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
    <label>Book Image</label>
    <input type="file" name="image" class="form-control">
    @error('image')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>


    <button class="btn btn-success">Save</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
