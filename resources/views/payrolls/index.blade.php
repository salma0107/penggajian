@extends('app')
@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
@endif

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    integrity="sha512-..." crossorigin="anonymous" />
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
        margin: 50px 50px 5px 50px;
        max-width: 100%;
    }

    .custom-container-up .btn {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease;
    }

    .custom-container-up .btn:hover {
        background-color: #ccc !important;
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

    .custom-button {
        border-radius: 0;
        font-size: 1.5em;
        transition: transform 0.1s ease-in-out;
        display: inline-block;
    }

    .custom-button:hover {
        transform: scale(1.2);
    }
</style>

<h1>DATA PAYROLL</h1>

<div class="custom-container-up text-end">
    <a class="btn text-dark bg-white" href="#">
        <i class="fas fa-file"></i>  Go to Report
    </a>
</div>

<div class="custom-container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NO</th>
                <th scope="col">NIP</th>
                <th scope="col">NAMA PEGAWAI</th>
                <th scope="col">EMAIL</th>
                <th scope="col">STATUS</th>
                <th scope="col">ACTION</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1 @endphp
            @foreach ($pegawais as $data)
            <tr data-pegawai-id="{{ $data->id }}">
                <td>
                    <a class="custom-button" href="{{ route('payrolls.create', ['pegawai_id' => $data->no_pegawai, 'nama_pegawai' => $data->nama_pegawai, 'email' => $data->email, 'golongan' => $data->golongan, 'status_perkawinan' => $data->status_perkawinan, 'divise_id' => $data->divise_id, 'position_id' => $data->position_id]) }}">
                        <i class="fas fa-plus-square text-success"></i>
                    </a>
                </td>
                <td>{{ $no++ }}</td>
                <td>{{ $data->no_pegawai }}</td>
                <td>{{ $data->nama_pegawai }}</td>
                <td>{{ $data->email }}</td>
                <td>
                    <a style="border-radius: 0; font-size: 1.5em;">
                        <i class="fas fa-check-circle text-success"></i>
                        <i class="fas fa-times-circle text-danger"></i>
                    </a>
                </td>
                <td>
                    <a class="btn btn-primary" href="#">
                        <i class="fas fa-paper-plane"></i> Send to email
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
