<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
    {
        return view('home');
    }

    public function store(RegisterRequest $request)
    {
        
        $data = $request->validated();
        $user = User::create($data);
        return redirect('login')->with('success', 'Registration successful!');
    }
}