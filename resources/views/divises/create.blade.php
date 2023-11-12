@extends('app')
@section('content')

<form action="{{ route('divises.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <br>
    <div class="row g-3">

        <div class="col-xs-12 col-sm-12 col-md-12 mb-2">
            <div class="form-group">
                <strong>Divisi</strong>
                <input type="text" name="nama_divisi" class="form-control" placeholder="Isi divisi disini">
                @error('nama_divisi')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary ml-2">Submit</button>
    </div>
</form>
@endsection
