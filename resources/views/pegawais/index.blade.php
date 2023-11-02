@extends('app')
@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
@endif

<style>
    .container {
      margin: 100px 20px; /* Mengatur margin atas dan bawah untuk menengahkan vertikal */
        max-width: 100%; /* Sesuaikan lebar maksimum sesuai kebutuhan Anda */
        background: white; /* Tambahkan latar belakang jika diperlukan */
        padding: 50px; /* Tambahkan padding sesuai kebutuhan Anda */
        text-align: center;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    .custom-container {
        margin: 10px 20px; /* Mengatur margin atas dan bawah untuk menengahkan vertikal */
        max-width: 100%; /* Sesuaikan lebar maksimum sesuai kebutuhan Anda */
        background: white;
        padding: 50px; /* Tambahkan padding sesuai kebutuhan Anda */
        text-align: center;
        border-radius: 10px;
        /* border: 1px solid #A9A9A9;  */
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 0 auto;
    }

    .table th,
    .table td {
        text-align: center;
    }

    .table tr:hover {
        background-color: #e6e6e6;
    }
    
    .text-end {
      margin-right: 20px;
    }
</style>

<div class="text-end mb-2">
<a class="btn btn-danger" href="#">
      <i class="fas fa-file-pdf"></i> Export PDF
  </a>
  <a class="btn btn-success" href="#">
      <i class="fas fa-file-excel"></i> Export Excel
  </a>
  <a class="btn btn-success" href="{{ route('pegawais.create') }}"> 
    <i class="fas fa-plus"></i> Create
  </a>
</div>

<div class="custom-container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">No Pegawai</th>
      <th scope="col">Nama Pegawai</th>
      <th scope="col">Email</th>
      <th scope="col">Alamat</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Golongan</th>
      <th scope="col">Status Perkawinan</th>
      <th scope="col">No Rekening</th>
      <th scope="col">Actions</th>
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


