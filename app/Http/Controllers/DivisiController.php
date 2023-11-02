<?php

namespace App\Http\Controllers;
use App\Models\Divisis;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    public function index()
    {
        $title = "Data Divisi";
        $divisis = Divisis::orderBy('id','asc')->paginate(10);
        return view('divisis.index', compact(['divisis' , 'title']));
    }

    public function create()
    {
        $title = "Tambah Data Divisi";
        return view('divisis.create', compact(['title']));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_divisi' => 'required'
        ]);
        
        Divisis::create($request->post());

        return redirect()->route('divisis.index')->with('success','divisi has been created successfully.');
    }

    public function show(Divisis $divisi)
    {
        return view('divisis.show',compact('divisi'));
    }
}
