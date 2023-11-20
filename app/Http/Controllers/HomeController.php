<?php

namespace App\Http\Controllers;

use App\Models\Positions;
use App\Models\Pegawais;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Add this line

class HomeController extends Controller
{
    public function index()
    {
        $title = "Home";
        $jumlahJabatan = Positions::count();
        $jumlahPegawai = Pegawais::count();
        $jumlahAdmin = User::count();

        return view('home', compact('jumlahJabatan', 'jumlahPegawai', 'jumlahAdmin', 'title'));
    }
}
