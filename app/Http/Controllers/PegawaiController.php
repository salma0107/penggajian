<?php

namespace App\Http\Controllers;
use App\Models\Positions;
use App\Models\Pegawais;
use App\Models\Divises;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index()
    {
        $title = "Data Pegawai";
        $pegawais = Pegawais::orderBy('id', 'asc')->paginate(10);
        $jumlahPegawai = DB::table('pegawais')->count();

        return view('pegawais.index', compact(['pegawais', 'title', 'jumlahPegawai']));
    }

    public function create()
    {
        $title = "Tambah Data pegawai";
        $positions = Positions::all();
        $divises = Divises::all();

        // Calculate and assign the next employee number
        $latestEmployee = Pegawais::orderBy('id', 'desc')->first();
        if ($latestEmployee) {
            $lastNumber = (int) substr($latestEmployee->no_pegawai, 2);
            $nextNumber = $lastNumber + 1;
            $nextEmployeeNumber = 'P-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        } else {
            $nextEmployeeNumber = 'P-0001';
        }

        return view('pegawais.create', compact('title', 'positions', 'divises', 'nextEmployeeNumber'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'no_pegawai' => 'required',
            'nama_pegawai' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'position_id' => 'required',
            'divise_id' => 'required',
            'golongan' => 'required',
            'status_perkawinan' => 'required',
            'no_rekening' => 'required',
        ]);

        $latestEmployee = Pegawais::orderBy('id', 'desc')->first();
        if ($latestEmployee) {
            $lastNumber = (int) substr($latestEmployee->no_pegawai, 2);
            $nextNumber = $lastNumber + 1;
            $nextEmployeeNumber = 'P-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
        } else {
            $nextEmployeeNumber = 'P-0001';
        }


        $employee = new Pegawais([
            'no_pegawai' => $nextEmployeeNumber,
            'nama_pegawai' => $validatedData['nama_pegawai'],
            'email' => $validatedData['email'],
            'alamat' => $validatedData['alamat'],
            'position_id' => $validatedData['position_id'],
            'divise_id' => $validatedData['divise_id'],
            'golongan' => $validatedData['golongan'],
            'status_perkawinan' => $validatedData['status_perkawinan'],
            'no_rekening' => $validatedData['no_rekening'],
        ]);
        $employee->save();

        return redirect()->route('pegawais.index')->with('success','Pegawai has been created successfully.');
    }

    public function show(Pegawais $pegawai)
    {
        return view('pegawais.create', compact('title', 'positions', 'divises', 'nextEmployeeNumber'));
    }

    public function edit(Pegawais $pegawai)
    {
        $title = "Edit Data Pegawai";
        $positions = Positions::all();
        $divises = Divises::all();

        return view('pegawais.edit', compact('title', 'pegawai', 'positions', 'divises'));
    }

    public function update(Request $request, Pegawais $pegawai)
    {
        $validatedData = $request->validate([
            'nama_pegawai' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'position_id' => 'required',
            'divise_id' => 'required',
            'golongan' => 'required',
            'status_perkawinan' => 'required',
            'no_rekening' => 'required',
        ]);

        $pegawai->update([
            'nama_pegawai' => $validatedData['nama_pegawai'],
            'email' => $validatedData['email'],
            'alamat' => $validatedData['alamat'],
            'position_id' => $validatedData['position_id'],
            'divise_id' => $validatedData['divise_id'],
            'golongan' => $validatedData['golongan'],
            'status_perkawinan' => $validatedData['status_perkawinan'],
            'no_rekening' => $validatedData['no_rekening'],
        ]);

        return redirect()->route('pegawais.index')->with('success', 'Pegawai telah diperbarui dengan sukses.');
    }

    public function destroy(Pegawais $pegawai)
    {
        
        $pegawai->delete();
        return redirect()->route('pegawais.index')->with('success', 'Pegawai telah dihapus dengan sukses.');
    }



}
