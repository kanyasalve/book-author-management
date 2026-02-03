@extends('layouts.app')

@section('content')
<h3>Authors</h3>
<a href="{{ route('authors.create') }}" class="btn btn-primary mb-2">Add Author</a>

<table class="table table-bordered">
<tr>
    <th>Name</th><th>Email</th><th>Action</th>
</tr>
@foreach($authors as $author)
<tr>
    <td>{{ $author->name }}</td>
    <td>{{ $author->email }}</td>
    <td>
        <a href="{{ route('authors.edit',$author) }}" class="btn btn-sm btn-warning">Edit</a>
        <form action="{{ route('authors.destroy', $author->id) }}"
          method="POST"
          style="display:inline-block"
          onsubmit="return confirm('Are you sure you want to delete this author?')">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm">Delete</button>
    </form>
    </td>
</tr>
@endforeach
</table>
@endsection
