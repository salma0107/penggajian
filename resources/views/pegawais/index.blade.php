@extends('app')
@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
@endif

<style>
    .custom-container {
        margin: 0px 50px;
        max-width: 100%;
        background: white;
        text-align: center;
    }

    .custom-container-up {
        margin: 50px 50px 10px 50px; /* top-right-bottom-left */
        max-width: 100%;
    }

    /* Style the table */
    .table {
        width: 100%;
        border-collapse: collapse;
        border-radius: 10px;
    }

    .table th,
    .table td {
        border: 1px solid #e3e3e3;
        padding: 10px;
        text-align: center;
    }

    .table th {
        background-color: #f2f2f2;
    }

    .table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table tr:hover {
        background-color: #e6e6e6;
    }

    h1 {
        margin-top: 20px;
    }
</style>

<h1>DATA PEGAWAI</h1>

<div class="custom-container-up">
    <div class="text-end mb-2">
        <a class="btn btn-danger" href="#">
            <i class="fas fa-file-pdf"></i> Export PDF
        </a>
        <a class="btn btn-success" href="#">
            <i class="fas fa-file-excel"></i> Export Excel
        </a>
        <a class="btn btn-warning" href="{{ route('pegawais.create') }}">
            <i class="fas fa-plus"></i> Create New
        </a>
    </div>
</div>



<div class="custom-container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">KODE</th>
                <th scope="col">NAMA PEGAWAI</th>
                <th scope="col">EMAIL</th>
                <th scope="col">ALAMAT</th>
                <th scope="col">JABATAN</th>
                <th scope="col">GOLONGAN</th>
                <th scope="col">STATUS</th>
                <th scope="col">NO REKENING</th>
                <th scope="col">ACTIONS</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1 @endphp
            @foreach ($pegawais as $data)
            <tr>
                <td class="text-center">{{ $no ++ }}</td>
                <td class="text-center">{{ $data->no_pegawai }}</td>
                <td class="text-center">{{ $data->nama_pegawai }}</td>
                <td class="text-center">{{ $data->email }}</td>
                <td class="text-center">{{ $data->alamat }}</td>
                <td>{{
                    (isset($data->position->jabatan)) ?
                    $data->position->jabatan :
                    'Tidak Ada'
                    }}
                </td>
                <td class="text-center">{{ $data->golongan }}</td>
                <td class="text-center">{{ $data->status_perkawinan }}</td>
                <td class="text-center">{{ $data->no_rekening }}</td>
                <td class="text-center">
                    <form action="{{ route('pegawais.destroy', $data->id) }}" method="Post">
                        <a class="btn btn-primary" href="{{ route('pegawais.edit', $data->id) }}">
                            <i class="fas fa-pencil-alt"></i> <!-- Icon pensil -->
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> <!-- Icon sampah -->
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection