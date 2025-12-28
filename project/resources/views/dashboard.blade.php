@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Dashboard</h1>

    <div class="row g-3">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm position-relative">
                <div class="card-body">
                    <h5 class="card-title mb-2">Users</h5>
                    <div class="display-6">{{ $stats['users'] ?? 0 }}</div>
                    <a href="{{ url('/users') }}" class="stretched-link" aria-label="Go to Users"></a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm position-relative">
                <div class="card-body">
                    <h5 class="card-title mb-2">Book</h5>
                    <div class="display-6">{{ $stats['books'] ?? 0 }}</div>
                    <a href="{{ url('/books') }}" class="stretched-link" aria-label="Go to Book"></a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm position-relative">
                <div class="card-body">
                    <h5 class="card-title mb-2">Borrows</h5>
                    <div class="display-6">0</div>
                    <a href="{{ url('/borrows') }}" class="stretched-link" aria-label="Go to Borrows"></a>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white">
                <h2 class="h5 mb-0">Quick Actions</h2>
            </div>
            <div class="card-body">
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ url('/users/create') }}" class="btn btn-primary">Add User</a>
                    <a href="{{ url('/books/create') }}" class="btn btn-primary">Add Book</a>
                    <a href="{{ url('/borrows/create') }}" class="btn btn-primary">Add Borrow</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection