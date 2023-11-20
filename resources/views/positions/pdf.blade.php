@extends('app')
@extends('layout')
@section('content')

<!-- <style>
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
</style> -->

<h1>DATA JABATAN</h1>
<div class="custom-container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">JABATAN</th>
                <th scope="col">GAJI POKOK</th>
                
            </tr>
        </thead>
        <tbody>
            @php $no = 1 @endphp
            @foreach ($positions as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->jabatan }}</td>
                <td>{{ $data->gaji_pokok }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
