@extends('layouts.app')

@section('content')
<h3>Edit Author</h3>

<form method="POST" action="{{ route('authors.update', $author->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control"
               value="{{ old('name', $author->name) }}">
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control"
               value="{{ old('email', $author->email) }}">
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
