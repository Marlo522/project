<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all users with pagination
        $users = User::query()->latest()->paginate(10);

        return view('userslist', compact('users'));
    }
}