<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\Authentication\User;

class DashboardController extends Controller
{
    public function index()
    {
        // ambil semua user
        $users = User::all();

        // kirim ke view
        return view('dashboard.dashboard', compact('users'));
    }
}
