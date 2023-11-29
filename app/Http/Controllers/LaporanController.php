<?php

namespace App\Http\Controllers;
use App\Models\Payrolls;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $title = "Laporan Penggajian";
        $payrolls = Payrolls::all();

        return view('laporans.index', compact('title', 'payrolls'));
    }
}
