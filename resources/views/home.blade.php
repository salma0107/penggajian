@extends('app')
@section('content')

<style>
    .custom-container {
        margin: 100px 20px; /* Mengatur margin atas dan bawah untuk menengahkan vertikal */
        max-width: 100%; /* Sesuaikan lebar maksimum sesuai kebutuhan Anda */
        background: #F6BC15; /* Tambahkan latar belakang jika diperlukan */
        padding: 50px; /* Tambahkan padding sesuai kebutuhan Anda */
        text-align: center;
        border-radius: 20px;
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