<?php

namespace App\Http\Controllers;
use App\Models\Gajis;
use App\Models\Positions;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    public function index()
    {
        $title = "Data Slip Gaji";
        $gajis = Gajis::orderBy('id','asc')->paginate(10);
        return view('gajis.index', compact(['gajis' , 'title']));
    }

    public function create()
    {
        $title = "Membuat Slip Gaji";
        $positions = Positions::all();

        return view('gajis.create', compact('title', 'positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_slip' => 'required',
            'start_date' => 'required|date',
            'position_id' => 'required|exists:positions,id',
            'gaji_pokok' => 'required|numeric',
        ]);

        Gajis::create([
            'no_slip' => $request->input('no_slip'),
            'slip_date' => $request->input('start_date'),
            'position_id' => $request->input('position_id'),
            'gaji_pokok' => $request->input('gaji_pokok'),
        ]);

        return redirect()->route('gajis.index')->with('success', 'Data Slip Gaji berhasil disimpan.');
    }

    public function show(Gajis $gaji)
    {
        return view('gajis.create', compact('title', 'positions'));
    }

    public function destroy(Gajis $gaji)
    {
        
        $gaji->delete();
        return redirect()->route('gajis.index')->with('success', 'gaji telah dihapus dengan sukses.');
    }
}
