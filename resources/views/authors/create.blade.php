@extends('layouts.app')

@section('content')
<h3>Add Author</h3>

<form method="POST" action="{{ route('authors.store') }}">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <button class="btn btn-success">Save</button>
    <a href="{{ route('authors.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
