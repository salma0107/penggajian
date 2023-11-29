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
    .custom-container {
        margin: 10px 20px; /* Mengatur margin atas dan bawah untuk menengahkan vertikal */
        max-width: 100%; /* Sesuaikan lebar maksimum sesuai kebutuhan Anda */
        background: white;
        padding: 50px; /* Tambahkan padding sesuai kebutuhan Anda */
        text-align: center;
        border-radius: 10px;
        /* border: 1px solid #A9A9A9;  */
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
    }
</style>

<div class="custom-container">
<form action="{{ route('gajis.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-3">
        <div class="col-md-6">
            <div class="form-group">
                <label for="no_slip"><strong>No Slip</strong></label>
                <div class="input-group">
                    <input type="text" name="no_slip" class="form-control" id="no_slip" placeholder="Isi No Slip disini" required>
                </div>
            </div>
        </div>

        <div class="col-md-6">
                <div class="form-group">
                    <label for="slip_date"><strong>Tanggal</strong></label>
                    <div class="input-group">
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                    </div>
                </div>
            </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="position_id"><strong>Jabatan</strong></label>
                <div class="input-group">
                    <select name="position_id" id="position_id" class="form-control">
                        @foreach($positions as $position)
                            <option value="{{ $position->id }}" data-gaji="{{ $position->gaji_pokok }}">{{ $position->jabatan }}</option>
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
                    <label for="gaji_pokok"><strong>Gaji Pokok</strong></label>
                    <div class="input-group">
                        <input type="text" name="gaji_pokok" class="form-control" id="gaji_pokok" placeholder="Isi Gaji Pokok disini" readonly>
                    </div>
                    @error('gaji_pokok')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        <button type="submit" class="btn btn-primary ml-3">Submit</button>
    </div>
</form>
</div>

<script>
    // Isi otomatis nilai gaji_pokok saat halaman pertama kali dimuat
    document.addEventListener('DOMContentLoaded', function () {
        var selectedPosition = document.getElementById('position_id').options[0]; // Pilih jabatan pertama
        var gajiPokok = selectedPosition.getAttribute('data-gaji');
        document.getElementById('gaji_pokok').value = gajiPokok;
    });

    // Ubah nilai gaji_pokok saat kita milih jabatan
    document.getElementById('position_id').addEventListener('change', function () {
        var selectedPosition = this.options[this.selectedIndex];
        var gajiPokok = selectedPosition.getAttribute('data-gaji');
        document.getElementById('gaji_pokok').value = gajiPokok;
    });
</script>

@endsection
