<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
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
        return view('addbook');
    }

    public function store(StoreBookRequest $request)
    {
        $data = $request->validated();
        Book::create($data);
        return redirect()->route('books.index')->with('status', 'Book added');
    }

    public function edit(Book $book)
    {
        return view('editbook', compact('book'));
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $data = $request->validated();
        $book->update($data);
        return redirect()->route('books.index')->with('status', 'Book updated');
    }

    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('status', 'Book deleted');
    }
}