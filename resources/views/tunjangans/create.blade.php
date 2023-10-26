@extends('app')
@section('content')
<form action="{{ route('tunjangans.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-3">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tunjangan</strong>
                <input type="text" name="tunjangan" class="form-control" placeholder="Isi tunjangan disisni">
                @error('tunjangan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jabatan</strong>
                <select name="position_id" id="position_id" class="form-control">
                    @foreach($positions as $position)
                        <option value="{{ $position->id }}">{{ $position->jabatan }}</option>
                    @endforeach
                </select>
                @error('position_id')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Besar Tunjangan</strong>
                <input type="text" name="besar tunjangan" class="form-control" placeholder="isi besar tunjangan disini">
                @error('besar_tunjangan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary ml-3">Submit</button>
    </div>
</form>
@endsection
