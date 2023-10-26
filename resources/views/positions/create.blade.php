@extends('app')
@section('content')
<form action="{{ route('positions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-3">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jabatan</strong>
                <input type="text" name="jabatan" class="form-control" placeholder="Isi jabatan disisni">
                @error('jabatan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gaji Pokok</strong>
                <input type="text" name="gaji pokok" class="form-control" placeholder="isi gaji pokok disini">
                @error('gaji_pokok')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary ml-3">Submit</button>
    </div>
</form>
@endsection
