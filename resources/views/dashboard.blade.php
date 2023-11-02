<!-- dashboard.blade.php -->

@extends('app')
@section('content')

<style>
    .container {
        display: flex;
        flex-wrap: wrap;
        background: white;
        margin: 100px 20px;
    }

    .box {
        flex: 1;
        width: 100px;
        height: 100px;
        background-color: #3498db;
        box-sizing: border-box;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        margin: 0 5px; 
    }
</style>

<div class="Rectangle3" style="width: 100%; height: 100%; background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px"></div>
<div class="JumlahPegawai" style="left: 364px; top: 285px; position: absolute; color: black; font-size: 15px; font-family: Alike Angular; font-weight: 400; letter-spacing: 0.38px; word-wrap: break-word">Jumlah Pegawai</div>
<div style="left: 763px; top: 314px; position: absolute; color: black; font-size: 40px; font-family: Allerta; font-weight: 400; word-wrap: break-word">12</div>
<div class="JumlahAdmin" style="left: 764px; top: 285px; position: absolute; color: black; font-size: 15px; font-family: Alike Angular; font-weight: 400; letter-spacing: 0.38px; word-wrap: break-word">Jumlah Admin</div>
<div style="left: 1166px; top: 314px; position: absolute; color: black; font-size: 40px; font-family: Allerta; font-weight: 400; word-wrap: break-word">12</div>
<div class="JumlahJabatan" style="left: 1167px; top: 285px; position: absolute; color: black; font-size: 15px; font-family: Alike Angular; font-weight: 400; letter-spacing: 0.38px; word-wrap: break-word">Jumlah Jabatan</div>
<img class="1" style="width: 144px; height: 144px; left: 904px; top: 257px; position: absolute; border-top-left-radius: 15px" src="https://via.placeholder.com/144x144" />


<!-- <table class="table m-3">
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
      <td>Jeno</td>
      <td>Lee</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table> -->
@endsection