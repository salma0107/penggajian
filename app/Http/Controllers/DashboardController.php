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
        $title = "My Dashboard";
        return view('dashboard', compact('title'));
    }
}

// public function index()
//     {
//         $title = "Data Penempatan";
//         $penempatans = Penempatan::orderBy('id', 'asc')->paginate(5);
//         return view('penempatans.index', compact('title', 'penempatans'));
//     }
