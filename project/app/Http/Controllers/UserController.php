<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index(\Illuminate\Http\Request $request)
    {
        // Fetch all users with pagination
        $users = User::query()->latest()->paginate(10);

        return view('userslist', compact('users'));
    }

    public function create()
    {
        return view('adduser');
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        // Will be hashed automatically due to 'password' => 'hashed' cast
        User::create($validated);

        return redirect()->route('users.index')->with('status', 'User created.');
    }

    public function edit(User $user)
    {
        return view('edituser', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        // If password not filled, avoid overwriting existing password
        if (!$request->filled('password')) {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index')->with('status', 'User updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('status', 'User deleted.');
    }
}