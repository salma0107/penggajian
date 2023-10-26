@extends('app')
@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{session('success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
</div>
@endif

<div class="text-end mb-2">
  <a class="btn btn-success" href="{{ route('positions.create') }}"> Add Positions</a>
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Jabatan</th>
      <th scope="col">Gaji Pokok</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @php $no = 1 @endphp
    @foreach ($positions as $data)
    <tr>
      <td>{{ $no ++ }}</td>
      <td >{{ $data->jabatan }}</td>
      <td >{{ $data->gaji_pokok }}</td>
      <td>
        <form action="{{ route('positions.destroy',$data->id) }}" method="Post">
          <a class="btn btn-primary" href="{{ route('positions.edit',$data->id) }}">Edit</a>
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table

@endsection


