@extends('app')
@section('content')
<form action="{{ route('pegawais.update',$pegawai->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">

        <div class="col-md-6">
            <div class="form-group">
                <label for="no_pegawai"><strong>No Pegawai</strong></label>
                <div class="input-group">
                    <input type="text" name="no_pegawai" class="form-control" id="no_pegawai" value="{{ $pegawai->no_pegawai }}" placeholder="Isi no_pegawai disini" readonly>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="nama_pegawai"><strong>Nama Pegawai</strong></label>
                <div class="input-group">
                    <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai" placeholder="Isi nama_pegawai disini" value="{{ $pegawai->nama_pegawai }}">
                </div>
                @error('nama_pegawai')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="email"><strong>Email</strong></label>
                <div class="input-group">
                    <input type="text" name="email" class="form-control" id="email" placeholder="Isi email disini" value="{{ $pegawai->email }}">
                </div>
                @error('email')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="alamat"><strong>Alamat</strong></label>
                <div class="input-group">
                    <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Isi alamat disini" value="{{ $pegawai->alamat }}">
                </div>
                @error('alamat')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <strong>Jabatan</strong>
                <select name="position_id" id="position_id" class="form-control">
                    @foreach ($positions as $position)
                        <option value="{{ $position->id }}" {{ ($position->id == $pegawai->position_id) ? 'selected' : '' }}>
                            {{ $position->jabatan }}
                        </option>
                    @endforeach
                </select>
                @error('position_id')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <strong>Divisi</strong>
                <select name="divise_id" id="divise_id" class="form-control">
                    @foreach ($divises as $divise)
                        <option value="{{ $divise->id }}" {{ ($divise->id == $pegawai->divise_id) ? 'selected' : '' }}>
                            {{ $divise->nama_divisi }}
                        </option>
                    @endforeach
                </select>
                @error('divise_id')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="golongan"><strong>Golongan</strong></label>
                <div class="input-group">
                    <select name="golongan" class="form-control" id="golongan" value="{{ $pegawai->golongan }}">
                        <option value="PKWT" >PKWT</option>
                        <option value="PKWTT">PKWTT</option>
                    </select>
                </div>
                @error('golongan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="status_perkawinan"><strong>Status Perkawinan</strong></label>
                <div class="input-group">
                    <select name="status_perkawinan" class="form-control" id="status_perkawinan" value="{{ $pegawai->status_perkawinan }}">
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
                <label for="no_rekening"><strong>No Rekening</strong></label>
                <div class="input-group">
                    <input type="text" name="no_rekening" class="form-control" id="no_rekening" placeholder="Isi no_rekening disini" value="{{ $pegawai->no_rekening }}">
                </div>
                @error('no_rekening')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        
        <button type="submit" class="btn btn-primary mt-3 ml-3">Submit</button>
    </div>
</form>
@endsection