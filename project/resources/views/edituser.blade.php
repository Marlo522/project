@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white">
            <h1 class="h5 mb-0">Edit User</h1>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">Please fix the errors below.</div>
            @endif

            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required>
                    @error('name')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    @error('email')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input name="password" type="password" class="form-control">
                    @error('password')<div class="text-danger small">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input name="password_confirmation" type="password" class="form-control">
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection