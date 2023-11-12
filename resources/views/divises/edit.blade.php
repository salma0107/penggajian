@extends('app')
@section('content')
<form action="{{ route('divises.update', $divise->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Divisi</strong>
                <input type="text" name="nama_divisi" value="{{ $divise->nama_divisi }}" class="form-control" placeholder="Isi nama divise">
                @error('nama_divisi')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
@endsection
