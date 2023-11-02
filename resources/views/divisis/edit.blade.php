@extends('app')
@section('content')
<form action="{{ route('divisis.update', $position->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Divisi</strong>
                <input type="text" name="divisi" value="{{ $position->divisi }}" class="form-control" placeholder="Isi divisi">
                @error('divisi')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3 ml-3">Submit</button>
    </div>
</form>
@endsection
