<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::latest()->paginate(10);
        return view('booklist', compact('books'));
    }

    public function create()
    {
        // Uses your existing addbook view
        return view('addbook');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'author' => ['required','string','max:255'],
            'published_year' => ['required','integer','min:0','max:' . date('Y')],
            'genre' => ['required','string','max:100'],
            'quantity' => ['required','integer','min:0'],
        ]);

        Book::create($data);

        return redirect()->route('books.index')->with('status', 'Book added');
    }

    public function edit(Book $book)
    {
        return view('editbook', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'author' => ['required','string','max:255'],
            'published_year' => ['required','integer','min:0','max:' . date('Y')],
            'genre' => ['required','string','max:100'],
            'quantity' => ['required','integer','min:0'],
        ]);

        $book->update($data);

        return redirect()->route('books.index')->with('status', 'Book updated');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('status', 'Book deleted');
    }
}