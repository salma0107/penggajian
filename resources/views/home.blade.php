@extends('app')
@section('content')

<style>
       .custom-container {
        background-color: transparent; /* Hapus latar belakang agar bisa melihat gambar latar belakang */
    }

    .table {
        color: white; /* Mengatur warna teks tabel menjadi putih */
        text-align: center; /* Rata tengah semua teks dalam tabel */
    }

    .table th {
        background-color: transparent; /* Hapus latar belakang th agar sesuai dengan gambar latar belakang */
    }
</style>


<div class="custom-container">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Lee</td>
          <td>@morklee</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@jcobthorn</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td colspan="2">Larry the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>
</div>
@endsection
