@extends('app')
@section('content')
<form action="{{ route('tunjangans.update',$tunjangan->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tunjangan</strong>
                <input type="text" name="tunjangan" value="{{ $tunjangan->tunjangan }}" class="form-control" placeholder="Isi tunjangan">
                @error('tunjangan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jabatan</strong>
                <select name="position_id" id="position_id" class="form-control">
                    @foreach ($positions as $position)
                        <option value="{{ $position->id }}" {{ ($position->id==$tunjangan->position_id)? 'selected': ''}}>{{ $position->jabatan }}</option>
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
                <input type="text" name="besar tunjangan" class="form-control" placeholder="isi besar tunjangan" value="{{ $tunjangan->besar_tunjangan }}">
                @error('besar_tunjangan')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3 ml-3">Submit</button>
    </div>
</form>
@endsection