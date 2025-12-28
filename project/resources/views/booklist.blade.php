@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h1 class="h4 mb-0">Books</h1>
            <span class="text-muted small">Total: {{ $books->total() }}</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th style="width:60px">#</th>
                            <th>Name</th>
                            <th>Author</th>
                            <th style="width:140px">Published Year</th>
                            <th style="width:160px">Genre</th>
                            <th style="width:160px">Quantity</th>
                            <th style="width:160px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($books as $book)
                            <tr>
                                <td>{{ $book->id }}</td>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->author }}</td>
                                <td>{{ $book->published_year }}</td>
                                <td>{{ $book->genre }}</td>
                                <td>{{ $book->quantity }}</td>
                                <td class="d-flex gap-2">
                                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-outline-primary">
                                        <span class="material-symbols-outlined">person_edit</span>
                                    </a>
                                    <button
                                        type="button"
                                        class="btn btn-sm btn-outline-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal"
                                        data-action="{{ route('books.destroy', $book->id) }}"
                                        data-name="{{ $book->name }}"
                                    >
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">No books found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $books->onEachSide(1)->withQueryString()->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

<!-- Delete confirm modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="deleteUserForm" method="POST" class="modal-content">
      @csrf
      @method('DELETE')
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteLabel">Delete Book</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete <strong id="deleteUserName">this book</strong>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
    </form>
  </div>
</div>

<script>
document.getElementById('confirmDeleteModal').addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const action = button.getAttribute('data-action');
    const name = button.getAttribute('data-name') || 'this book';
    document.getElementById('deleteUserForm').setAttribute('action', action);
    document.getElementById('deleteUserName').textContent = name;
});
</script>
@endsection