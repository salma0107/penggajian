<?php

namespace App\Http\Controllers;
use App\Models\Payrolls;
use App\Models\Pegawais;
use App\Models\Positions;
use App\Models\Divises;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function index()
    {
        $title = "Data Karyawan";
        $payrolls = Payrolls::all();
        $pegawais = Pegawais::all();

        return view('payrolls.index', compact('title', 'pegawais', 'payrolls'));
    }

    public function create(Request $request)
    {
        $title = "Membuat Payroll";
        $positions = Positions::find($request->query('position_id'));
        $divises = Divises::find($request->query('divise_id'));

        // Perform additional checks to ensure the data is available
        if (!$positions || !$divises) {
            // Handle the case where the positions or divises are not found
            return redirect()->route('your_error_route')->with('error', 'Invalid position or divise selected');
        }

        // nomor slip otomatis
        $noSlip = 'S-' . date('ymd') . '-' . sprintf('%04d', Payrolls::count() + 1);

        // data buat isi otomatis yang create payroll
        $pegawai_id = $request->query('pegawai_id');
        $nama_pegawai = $request->query('nama_pegawai');
        $email = $request->query('email');
        $golongan = $request->query('golongan');
        $status_perkawinan = $request->query('status_perkawinan');
        $divise_id = $request->query('divise_id');
        $position_id = $request->query('position_id');

        return view('payrolls.create', compact('title', 'positions', 'divises', 'noSlip', 'pegawai_id', 'nama_pegawai', 'email', 'golongan', 'status_perkawinan', 'divise_id', 'position_id'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'no_slip' => 'required',
            'slip_date' => 'required|date',
            'pegawai_id' => 'required',
            'nama_pegawai' => 'required',
            'email' => 'required|email',
            'golongan' => 'required',
            'status_perkawinan' => 'required',
            'divise_id' => 'required',
            'position_id' => 'required',
            'gaji_pokok' => 'required|numeric',
            // Add other validation rules as needed
        ]);

        // Create a new Payroll instance
        $payroll = new Payrolls([
            'no_slip' => $request->input('no_slip'),
            'slip_date' => $request->input('slip_date'),
            'pegawai_id' => $request->input('pegawai_id'),
            'nama_pegawai' => $request->input('nama_pegawai'),
            'email' => $request->input('email'),
            'golongan' => $request->input('golongan'),
            'status_perkawinan' => $request->input('status_perkawinan'),
            'divise_id' => $request->input('divise_id'),
            'position_id' => $request->input('position_id'),
            'gaji_pokok' => $request->input('gaji_pokok'),
            // Add other fields as needed
        ]);

        // Save the Payroll instance
        $payroll->save();

        // Redirect back to the index page with a success message
        return redirect()->route('laporans.index')->with('success', 'Payroll data has been created successfully.');
    }

    public function show(Payrolls $pegawai)
    {
        return view('laporans.index', compact('title'));
    }


}
