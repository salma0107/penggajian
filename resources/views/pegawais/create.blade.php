@extends('app')
@section('content')

<style>
    /* CSS to left-align labels */
    .form-group label {
        text-align: left;
        display: block;
        width: 100%;
        margin-bottom: 15px;
    }
</style>

<form action="{{ route('pegawais.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-3">
        <div class="col-md-6">
            <div class="form-group">
                <label for="no_pegawai"><strong>no_pegawai</strong></label>
                <div class="input-group">
                    <input type="text" name="no_pegawai" class="form-control" id="no_pegawai" value="{{ $nextEmployeeNumber }}" placeholder="Isi no_pegawai disini" readonly>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="nama_pegawai"><strong>nama_pegawai</strong></label>
                <div class="input-group">
                    <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai" placeholder="Isi nama_pegawai disini">
                </div>
                @error('nama_pegawai')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="email"><strong>email</strong></label>
                <div class="input-group">
                    <input type="text" name="email" class="form-control" id="email" placeholder="Isi email disini">
                </div>
                @error('email')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="alamat"><strong>alamat</strong></label>
                <div class="input-group">
                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Isi alamat disini">
                </div>
                @error('alamat')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

    
        <div class="col-md-6">
            <div class="form-group">
                <label for="position_id"><strong>Jabatan</strong></label>
                <div class="input-group">
                    <select name="position_id" id="position_id" class="form-control">
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}">{{ $position->jabatan }}</option>
                        @endforeach
                    </select>
                </div>
                @error('position_id')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="golongan"><strong>golongan</strong></label>
                <div class="input-group">
                    <select name="golongan" class="form-control" id="golongan">
                        <option value="gol 1">gol 1</option>
                        <option value="gol 2">gol 2</option>
                        <option value="gol 3">gol 3</option>
                    </select>
                </div>
                @error('golongan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="status_perkawinan"><strong>status_perkawinan</strong></label>
                <div class="input-group">
                    <select name="status_perkawinan" class="form-control" id="status_perkawinan">
                        <option value="belum menikah">Belum Menikah</option>
                        <option value="sudah menikah">Sudah Menikah</option>
                    </select>
                </div>
                @error('status_perkawinan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <div class="col-md-6">
            <div class="form-group">
                <label for="no_rekening"><strong>no_rekening</strong></label>
                <div class="input-group">
                    <input type="text" name="no_rekening" class="form-control" id="no_rekening" placeholder="Isi no_rekening disini">
                </div>
                @error('no_rekening')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        
        <button type="submit" class="btn btn-primary ml-3">Submit</button>
    </div>
</form>
@endsection
