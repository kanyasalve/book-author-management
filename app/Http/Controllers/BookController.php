<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with('author')->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'author_id' => 'required',
            'title' => 'required',
            'published_year' => 'required|digits:4',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

        $data = $request->all();

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('books', $imageName, 'public');
        $data['image'] = $imageName;
    }

    Book::create($data);
        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Book added');
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('books.edit', compact('book', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'published_year' => 'required|digits:4',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'

        ]);

         $data = $request->all();

    if ($request->hasFile('image')) {

        // delete old image
        if ($book->image && file_exists(storage_path('app/public/books/' . $book->image))) {
            unlink(storage_path('app/public/books/' . $book->image));
        }

        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('books', $imageName, 'public');
        $data['image'] = $imageName;
    }


        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Book updated');
    }

   public function destroy(Book $book)
{
    if ($book->image && file_exists(storage_path('app/public/books/' . $book->image))) {
        unlink(storage_path('app/public/books/' . $book->image));
    }

    $book->delete();

    return redirect()->route('books.index')
                     ->with('success', 'Book deleted');
}

}
