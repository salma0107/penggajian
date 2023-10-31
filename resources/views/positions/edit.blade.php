@extends('app')
@section('content')
<form action="{{ route('positions.update', $position->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jabatan</strong>
                <input type="text" name="jabatan" value="{{ $position->jabatan }}" class="form-control" placeholder="Isi jabatan">
                @error('jabatan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gaji Pokok</strong>
                <input type="text" name="gaji_pokok" class="form-control" placeholder="Isi gaji pokok" value="{{ $position->gaji_pokok }}">
                @error('gaji_pokok')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3 ml-3">Submit</button>
    </div>
</form>
@endsection
