<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class DashboardController extends Controller
{
        public function index()
    {
        $title = "Dashboard";
        return view('dashboard', compact('title'));
    }
}

