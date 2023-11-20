<?php

namespace App\Http\Controllers;
use App\Models\Positions;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class PositionController extends Controller
{
    public function index()
    {
        $title = "Data Jabatan";
        $positions = Positions::orderBy('id','asc')->paginate(10);
        return view('positions.index', compact(['positions' , 'title']));
    }

    public function create()
    {
        $title = "Tambah Data Position";
        return view('positions.create', compact(['title']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan' => 'required',
            'gaji_pokok',
        ]);
        
        Positions::create($request->post());

        return redirect()->route('positions.index')->with('success','Position has been created successfully.');
    }

    public function show(Positions $position)
    {
        return view('positions.show',compact('position'));
    }

    public function edit(Positions $position)
    {
        $title = "Edit Data Position";
        return view('positions.edit',compact('position', 'title'));
    }

    public function update(Request $request, Positions $position)
    {
        $request->validate([
            'jabatan' => 'required',
            'gaji_pokok' => 'required',
        ]);
        
        $position->fill($request->post())->save();

        return redirect()->route('positions.index')->with('success','Position Has Been updated successfully');
    }

    public function destroy(Positions $position)
    {
        $position->delete();
        return redirect()->route('positions.index')->with('success','Position has been deleted successfully');
    }

    public function exportPdf()
    {
        $title = "Laporan Data Jabatan";
        $positions = Positions::orderBy('id', 'asc')->get();
        $pdf = PDF::loadView('positions.pdf', compact(['positions', 'title']));
        return $pdf->stream('laporan-jabatan-pdf');
    }
}
