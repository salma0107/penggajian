@extends('app')
@section('content')

<style>
    /* CSS to left-align labels */
    .form-group label {
        text-align: left;
        display: block;
        width: 100%;
        margin-bottom: 5px;
        margin-top: 15px;
    }

    .custom-container {
        margin: 10px 20px;
        max-width: 1000px;
        background: transparent;
        padding: 30px 50px 40px 50px;
        text-align: center;
        /* Add the following line for centering horizontally */
        margin-left: auto;
        margin-right: auto;
    }
</style>

<h1>CREATE PAYROLL</h1>

<div class="custom-container mx-auto">

    <hr>

    <form action="{{ route('payrolls.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">
            
            <!-- Left column -->
            <div class="col-md-6">
                <div class="form-group">
                    <label style="font-weight: 600;" for="no_slip">No Slip</label>
                    <div class="input-group">
                        <input style="background-color: white;" type="text" name="no_slip" class="form-control"
                            id="no_slip" placeholder="" value="{{ $noSlip }}" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label style="font-weight: 600;" for="slip_date">Tanggal</label>
                    <div class="input-group">
                        <input style="background-color: white;" type="date" class="form-control" id="slip_date"
                            name="slip_date" value="{{ old('start_date') }}" required>
                    </div>
                </div>
            </div>

            <!-- Right column -->
            <div class="col-md-6">

                <div class="form-group">
                    <label style="font-weight: 600;" for="pegawai_id">NIP</label>
                    <div class="input-group">
                        <input style="background-color: white;" type="text" name="pegawai_id" class="form-control"
                            id="pegawai_id" placeholder="Isi NIP disini" value="{{ $pegawai_id }}" readonly>
                    </div>
                    @error('pegawai_id')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label style="font-weight: 600;" for="nama_pegawai">Nama Pegawai</label>
                    <div class="input-group">
                        <input style="background-color: white;" type="text" name="nama_pegawai" class="form-control"
                            id="nama_pegawai" placeholder="Isi Nama Pegawai disini" value="{{ $nama_pegawai }}"
                            readonly>
                    </div>
                    @error('nama_pegawai')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label style="font-weight: 600;" for="email">Email</label>
                    <div class="input-group">
                        <input style="background-color: white;" type="text" name="email" class="form-control" id="email"
                            placeholder="Isi Email disini" value="{{ $email }}" readonly>
                    </div>
                    @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label style="font-weight: 600;" for="golongan">Golongan</label>
                    <div class="input-group">
                        <input style="background-color: white;" type="text" name="golongan" class="form-control"
                            id="golongan" placeholder="Isi Golongan disini" value="{{ $golongan }}" readonly>
                    </div>
                    @error('golongan')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label style="font-weight: 600;" for="status_perkawinan">Status Perkawinan</label>
                    <div class="input-group">
                        <input style="background-color: white;" type="text" name="status_perkawinan"
                            class="form-control" id="status_perkawinan" placeholder="Isi Status Perkawinan disini"
                            value="{{ $status_perkawinan }}" readonly>
                    </div>
                    @error('status_perkawinan')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label style="font-weight: 600;" for="divise_id">Divisi</label>
                    <div class="input-group">
                        <input style="background-color: white;" type="hidden" name="divise_id" class="form-control"
                            id="divise_id" placeholder="Isi Divisi disini" value="{{ $divise_id }}" readonly>
                        <input style="background-color: white;" type="text" name="divise" class="form-control"
                            id="divise" placeholder="Isi Divisi disini" value="{{ $divises->nama_divisi }}" readonly>
                    </div>
                    @error('divise_id')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label style="font-weight: 600;" for="position_id">Jabatan</label>
                    <div class="input-group">
                        <input style="background-color: white;" type="hidden" name="position_id" class="form-control"
                            id="position_id" placeholder="Isi Jabatan disini" value="{{ $position_id }}" readonly>
                        <input style="background-color: white;" type="text" name="position" class="form-control"
                            id="position" placeholder="Isi Jabatan disini" value="{{ $positions->jabatan }}" readonly>
                    </div>
                    @error('position_id')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <br>

            </div>

            
            <hr>
            <br>

            <div class="row g-3">

                <!-- Left column -->
                <div class="col-md-6">

                    <!-- <div class="form-group">
                        <label style="font-weight: 600;" for="no_slip">Gaji Pokok</label>
                        <div class="input-group">
                            <input style="background-color: white;" type="text" name="gaji_pokok" class="form-control"
                                id="gaji_pokok" placeholder="Isi Gaji Pokok disini" value="{{ $positions->gaji_pokok }}"
                                readonly>
                        </div>
                        @error('gaji_pokok')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div> -->

                    <!-- <div class="form-group">
                        <label style="font-weight: 600;" for="no_slip">Tunjangan Makan</label>
                        <div class="input-group">
                            <input style="background-color: white;" type="text" name="no_slip" class="form-control"
                                id="no_slip" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label style="font-weight: 600;" for="no_slip">Tunjangan Keahlian</label>
                        <div class="input-group">
                            <input style="background-color: white;" type="text" name="no_slip" class="form-control"
                                id="no_slip" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label style="font-weight: 600;" for="no_slip">Tunjangan dll</label>
                        <div class="input-group">
                            <input style="background-color: white;" type="text" name="no_slip" class="form-control"
                                id="no_slip" placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label style="font-weight: 600;" for="no_slip">Lembur</label>
                        <div class="input-group">
                            <input style="background-color: white;" type="text" name="no_slip" class="form-control"
                                id="no_slip" placeholder="Lembur">
                        </div>
                    </div> -->

                </div>

                <!-- Right column -->
                <div class="col-md-6">

                    <!-- <div class="form-group">
                        <label style="font-weight: 600;" for="gaji_pokok">Tarif PPH21</label>
                        <div class="input-group">
                            <input style="background-color: white;" type="text" name="gaji_pokok" class="form-control"
                                id="gaji_pokok" placeholder="">
                        </div>
                        @error('gaji_pokok')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label style="font-weight: 600;" for="gaji_pokok">BPJS Kesehatan</label>
                        <div class="input-group">
                            <input style="background-color: white;" type="text" name="gaji_pokok" class="form-control"
                                id="gaji_pokok" placeholder="">
                        </div>
                        @error('gaji_pokok')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label style="font-weight: 600;" for="gaji_pokok">BPJS Ketenagakerjaan</label>
                        <div class="input-group">
                            <input style="background-color: white;" type="text" name="gaji_pokok" class="form-control"
                                id="gaji_pokok" placeholder="">
                        </div>
                        @error('gaji_pokok')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label style="font-weight: 600;" for="no_slip">Absen</label>
                        <div class="input-group">
                            <input style="background-color: white;" type="text" name="no_slip" class="form-control"
                                id="no_slip" placeholder="Absen">
                        </div>
                    </div> -->

                </div>

            </div>

            <div class="row g-3">
                <!-- Left column -->
                <div class="col-md-6">
                    <hr style="margin: 10px 10px; border-width: 2px;">
                    <p></p>
                </div>
                <!-- Right column -->
                <div class="col-md-6">
                    <hr style="margin: 10px 10px; border-width: 2px;">
                    <p></p>
                </div>

            </div>

            <div class="row g-3">

                <!-- Left column -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label style="font-weight: 600;" for="gaji_kotor">Gaji Kotor</label>
                        <div class="input-group">
                            <input style="background-color: white;" type="text" name="gaji_kotor" class="form-control"
                                id="gaji_kotor" placeholder="">
                        </div>
                    </div>
                </div>

                <!-- Right column -->
                <!-- <div class="col-md-6">
                    <div class="form-group">
                        <label style="font-weight: 600;" for="no_slip">Potongan</label>
                        <div class="input-group">
                            <input style="background-color: white;" type="text" name="no_slip" class="form-control"
                                id="no_slip" placeholder="">
                        </div>
                    </div>
                </div> -->
            </div>

            <hr>

            <div class="row g-3">

                <!-- Left column -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="text-end" style="font-weight: 600;" for="gaji_bersih">Gaji Bersih</label>
                    </div>
                </div>

                <!-- Right column -->
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- <label style="font-weight: 600;" for="gaji_bersih">Potongan</label> -->
                        <div class="input-group">
                            <input style="background-color: white;" type="text" name="gaji_bersih" class="form-control"
                                id="gaji_bersih" placeholder="">
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary ml-3">Submit</button>

    </form>
    
</div>

@endsection