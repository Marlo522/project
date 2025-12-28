<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users' => User::count(),
            'books' => DB::table('books')->count(),
        ];

        return view('dashboard', compact('stats'));
    }
}