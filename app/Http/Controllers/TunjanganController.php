<?php

namespace App\Http\Controllers;
use App\Models\Positions;
use App\Models\Tunjangans;
use Illuminate\Http\Request;

class TunjanganController extends Controller
{
    public function index()
    {
        $title = "Data Tunjangan";
        $tunjangans = Tunjangans::with('position')->orderBy('id', 'asc')->paginate(5);
        return view('tunjangans.index', compact(['tunjangans' , 'title']));
    }

    public function create()
    {
        $title = "Tambah Data Tunjangan";
        $positions = Positions::all();
        return view('tunjangans.create', compact(['title', 'positions']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tunjangan' => 'required',
            'besar_tunjangan' => 'required',
            'position_id' => 'required', // Make sure to validate this field
        ]);
        
        Tunjangans::create($request->all());

        return redirect()->route('tunjangans.index')->with('success','Tunjangan has been created successfully.');
    }

    public function show(Tunjangans $tunjangan)
    {
        return view('tunjangans.show',compact('tunjangan'));
    }

    public function edit(Tunjangans $tunjangan)
    {
        $title = "Edit Data Tunjangan";
        $positions = Positions::all(); // Get all positions from the database
        return view('tunjangans.edit', compact('title', 'tunjangan', 'positions'));
    }

    public function update(Request $request, Tunjangans $tunjangan)
    {
        $request->validate([
            'tunjangan' => 'required',
            'besar_tunjangan' => 'required',
        ]);
        
        $tunjangan->fill($request->post())->save();

        return redirect()->route('tunjangans.index')->with('success','Tunjangan Has Been updated successfully');
    }

    public function destroy(Tunjangans $tunjangan)
    {
        $tunjangan->delete();
        return redirect()->route('tunjangans.index')->with('success','Tunjangan has been deleted successfully');
    }
}
