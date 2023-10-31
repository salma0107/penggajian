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
<form action="{{ route('tunjangans.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <br>
    <div class="row g-3">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="tunjangan"><strong>Tunjangan</strong></label>
                <div class="input-group">
                    <input type="text" name="tunjangan" class="form-control" id="tunjangan" placeholder="Isi tunjangan disini">
                </div>
                @error('tunjangan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
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
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="besar_tunjangan"><strong>Besar Tunjangan</strong></label>
                <div class="input-group">
                    <input type="text" name="besar_tunjangan" class="form-control" id="besar_tunjangan" placeholder="Isi besar tunjangan disini">
                </div>
                @error('besar_tunjangan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary ml-3">Submit</button>
    </div>
</form>
@endsection
