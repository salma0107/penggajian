@extends('app')
@section('content')

<style>
    .custom-container {
        margin: 0px 20px;
        max-width: 100%;
        background: white;
        padding: 30px;
        text-align: center;
        border-radius: 10px;
    }

    /* Style the table */
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th, .table td {
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
</style>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
@endif

<div class="text-end mb-3 mt-4">
    <a class="btn btn-success" href="{{ route('tunjangans.create') }}">
        <i class="fas fa-plus"></i> Add Tunjangan
    </a>
</div>

<div class="custom-container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Tunjangan</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Besar Tunjangan</th>
      <th scope="col">Actions</th>
  </tr>
  </thead>

  <tbody>
    @php $no = 1 @endphp
    @foreach ($tunjangans as $data)
    <tr>
      <td>{{ $no++ }}</td>
      <td>{{ $data->tunjangan }}</td>
      <td>{{ 
          (isset($data->position->jabatan)) ? 
          $data->position->jabatan : 
          'Tidak Ada'
          }}
      </td>
      <td>{{ $data->besar_tunjangan }}</td>
      <td>
        <form action="{{ route('tunjangans.destroy', $data->id) }}" method="POST">
          <a class="btn btn-primary" href="{{ route('tunjangans.edit', $data->id) }}">Edit</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
        </div>

@endsection