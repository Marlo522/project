@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
            <h1 class="h5 mb-0">Edit Book</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('books.update', $book->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" value="{{ old('name', $book->name) }}">
                    @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Author</label>
                    <input name="author" type="text" class="form-control" value="{{ old('author', $book->author) }}">
                    @error('author')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Published Year</label>
                    <input name="published_year" type="number" class="form-control" value="{{ old('published_year', $book->published_year) }}">
                    @error('published_year')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Genre</label>
                    <input name="genre" type="text" class="form-control" value="{{ old('genre', $book->genre) }}">
                    @error('genre')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity</label>
                    <input name="quantity" type="number" class="form-control" value="{{ old('quantity', $book->quantity) }}">
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection