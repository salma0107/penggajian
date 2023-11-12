<?php

namespace App\Http\Controllers;
use App\Models\Divises;
use App\Models\User;
use Illuminate\Http\Request;
// use PDF;

class DivisiController extends Controller
{
    public function index()
    {
        $title = "Data Divise";
        $divises = Divises::orderBy('id','asc')->paginate(5);
        return view('divises.index', compact('divises', 'title'));
    }

    public function create()
    {
        $title = "Add Data Divisi";
        return view('divises.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_divisi' => 'required',
        ]);
        
        Divises::create($request->post());
        return redirect()->route('divises.index')->with('success','divise has been created successfully.');
    }

    public function edit(Divises $divise)
    {
        $title = "Edit Data Divises";
        return view('divises.edit', compact('divise', 'title'));
    }

    public function update(Request $request, Divises $divise)
    {
        $request->validate([
            'nama_divisi' => 'required',
        ]);
        
        $divise->fill($request->post())->save();

        return redirect()->route('divises.index')->with('success','Divises Has Been updated successfully');
    }

    public function destroy(Divises $divise)
    {
        $divise->delete();
        return redirect()->route('divises.index')->with('success','Divises has been deleted successfully');
    }

    // public function exportPdf()
    // {
    //     $title = "Laporan Data Divises";
    //     $divises = Divises::orderBy('id','asc')->get();
    //     $pdf = PDF::loadview('divises.pdf', compact('divises', 'title'));
    //     return $pdf->stream('laporan_divisi');
    // }
}
