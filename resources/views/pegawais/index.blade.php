@extends('app')
@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
@endif

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

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

    .img-fluid {
        margin-top: 0;
        margin-bottom: 10px;
    }

    .img p {
        /* color: red; */
        margin-bottom: 20px;
        
    }

    .close {
        background: transparent;
        border: 1px solid #000;
    }

    .close:hover {
        background-color: red !important;
        border-color: white;
    }

    .close:hover span {
        color: white;
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
                <th scope="col">DIVISI</th>
                <th scope="col">STATUS KARYAWAN</th>
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
                <td>{{
                    (isset($data->divise->nama_divisi)) ?
                    $data->divise->nama_divisi :
                    'Tidak Ada'
                    }}
                </td>
                <td class="text-center">{{ $data->golongan }}</td>
                <td class="text-center">{{ $data->status_perkawinan }}</td>
                <td class="text-center">{{ $data->no_rekening }}</td>
                <td class="text-center">
                    <form action="{{ route('pegawais.destroy', $data->id) }}" method="Post" id="deleteForm">
                        <a class="btn btn-primary" href="{{ route('pegawais.edit', $data->id) }}">
                            <i class="fas fa-pencil-alt"></i> <!-- Icon pensil -->
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDelete">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class=" d-flex justify-content-end" style="margin: 15px 15px 0 15px;">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="width: 40px;"> 
                        <span aria-hidden="true" style="font-size: 24px;">&times;</span>
                    </button>
                </div>
                <div class="img">
                    <img src="/images/warn.png" class="img-fluid">
                    <p>Apakah Anda yakin ingin menghapus data ini?</p>
                </div>
                <div style="margin-bottom: 20px;">
                    <button style="width: 150px; margin-right: 25px; margin-bottom: 15px; margin-top: 15px;" type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                    <button style="width: 150px; margin-left: 25px; margin-bottom: 15px; margin-top: 15px;" type="button" class="btn btn-success"
                        onclick="document.getElementById('deleteForm').submit()">Yes</button>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection