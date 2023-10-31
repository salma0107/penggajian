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

<div class="container" style="justify-content: center;">
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
</div>

<table class="table m-3">
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
</table>
@endsection