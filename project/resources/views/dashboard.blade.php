@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Dashboard</h1>

    <div class="row g-3">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-2">Users</h5>
                    <div class="display-6">{{ $stats['users'] ?? 0 }}</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-2">Equipment</h5>
                    <div class="display-6">0</div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-2">Borrows</h5>
                    <div class="display-6">0</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection