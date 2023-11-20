@extends('app')
@section('content')

<html>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>




<body>

    <div class="custom-container">
        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
              
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_pegawai"><strong>No Slip</strong></label>
                        <div class="input-group">
                            <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai"
                                placeholder="Isi no slip disini">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal"><strong>Tanggal</strong></label>
                        <div class="input-group">
                            <input type="text" id="tanggal" name="tanggal" class="form-control datepicker" placeholder="Pilih tanggal" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_pegawai"><strong>NIP</strong></label>
                        <div class="input-group">
                            <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai"
                                placeholder="Isi NIP disini">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_pegawai"><strong>Nama Pegawai</strong></label>
                        <div class="input-group">
                            <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai"
                                placeholder="Isi nama pegawai disini">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email"><strong>Email</strong></label>
                        <div class="input-group">
                            <input type="text" name="email" class="form-control" id="email"
                                placeholder="Isi email disini">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="alamat"><strong>Alamat</strong></label>
                        <div class="input-group">
                            <input type="text" name="alamat" class="form-control" id="alamat"
                                placeholder="Isi alamat disini">
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="position_id"><strong>Jabatan</strong></label>
                        <div class="input-group">
                            <select name="position_id" id="position_id" class="form-control">
                                <option value="belum menikah">Belum Menikah</option>
                                <option value="sudah menikah">Sudah Menikah</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="golongan"><strong>Golongan</strong></label>
                        <div class="input-group">
                            <select name="golongan" class="form-control" id="golongan">
                                <option value="gol 1">gol 1</option>
                                <option value="gol 2">gol 2</option>
                                <option value="gol 3">gol 3</option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status_perkawinan"><strong>Status Perkawinan</strong></label>
                        <div class="input-group">
                            <select name="status_perkawinan" class="form-control" id="status_perkawinan">
                                <option value="belum menikah">Belum Menikah</option>
                                <option value="sudah menikah">Sudah Menikah</option>
                            </select>
                        </div>

                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_rekening"><strong>No Rekening</strong></label>
                        <div class="input-group">
                            <input type="text" name="no_rekening" class="form-control" id="no_rekening"
                                placeholder="Isi no rekening disini">
                        </div>

                    </div>
                </div>


                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>

    <br>
    <br>
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


    <script>
        // Mendapatkan elemen input tanggal
        const tanggalInput = document.getElementById('tanggal');

        // Membuat objek Date dengan tanggal hari ini
        const tanggalHariIni = new Date();

        // Format tanggal dalam bentuk YYYY-MM-DD
        const formattedTanggal = tanggalHariIni.toISOString().split('T')[0];

        // Mengatur nilai default input tanggal
        tanggalInput.value = formattedTanggal;
    </script>


</body>

</html>



@endsection