<?php

namespace App\Http\Controllers;
use App\Models\Gajis;
use App\Models\Pegawais;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    public function index()
    {
        $title = "Data Slip Gaji";
        $gajis = Gajis::orderBy('id','asc')->paginate(10);
        return view('gajis.index', compact(['gajis' , 'title']));
    }
}
