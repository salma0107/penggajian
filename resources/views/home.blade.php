@extends('app')
@section('content')

<style>
    .custom-container {
        background-color: transparent; 
    }
    .table {
        color: black; 
        text-align: center;
    }
    .table th {
        background-color: transparent;
    }
    .rectangle-all {
        margin-top: 10px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .Rectangle {
        width: 320px;
        height: 120px;
        background: white;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 15px;
        display: flex;
        align-items: center;
        margin: 20px;
        justify-content: space-between;
    }
    .text-container {
        display: flex;
        flex-direction: column; /* Mengatur tata letak menjadi satu kolom */
    }
    .text-rectangle {
        color: black;
        font-size: 15px;
        font-family: 'Alike Angular';
        font-weight: 400;
        letter-spacing: 0.38px;
        word-wrap: break-word;
        margin-left: 15px;
    }
    .text-jumlah {
        color: black;
        font-size: 40px;
        font-family: Allerta;
        font-weight: 400;
        word-wrap: break-word;
        margin-left: 15px;
        margin-top: 10px;
    }
    .PegawaiImage {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
        border-radius: 15px;
        margin-right: 10px;
    }
    @media screen and (max-width: 768px) {
        .rectangle-all {
            flex-direction: column;
        }
        .Rectangle {
            width: 90%;
        }
    }

</style>

<div>
    <div style="color: black; font-size: 35px; font-family: Allerta; font-weight: 400; word-wrap: break-word">DASHBOARD</div>
    <div style="color: #054468; font-size: 25px; font-family: Allerta; font-weight: 400; word-wrap: break-word">PT. INTI PINDAD MITRA SEJATI</div>
</div>

<div class="rectangle-all">
        <div class="Rectangle">
            <div class="text-container">
                <div class="text-rectangle">Jumlah Pegawai</div>
                <div class="text-jumlah">12</div>
            </div>
            <img class="PegawaiImage" src="/images/pegawai.jpg" alt="Jumlah Pegawai">
        </div>
        
        <div class="Rectangle">
            <div class="text-container">
                <div class="text-rectangle">Jumlah Pegawai</div>
                <div class="text-jumlah">12</div>
            </div>
            <img class="PegawaiImage" src="/images/pegawai.jpg" alt="Jumlah Pegawai">
        </div>

        <div class="Rectangle">
            <div class="text-container">
                <div class="text-rectangle">Jumlah Pegawai</div>
                <div class="text-jumlah">12</div>
            </div>
            <img class="PegawaiImage" src="/images/pegawai.jpg" alt="Jumlah Pegawai">
        </div>

        <div class="Rectangle">
            <div class="text-container">
                <div class="text-rectangle">Jumlah Pegawai</div>
                <div class="text-jumlah">12</div>
            </div>
            <img class="PegawaiImage" src="/images/pegawai.jpg" alt="Jumlah Pegawai">
        </div>
  </div>


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
