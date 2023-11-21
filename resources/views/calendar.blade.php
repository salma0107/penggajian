@extends('app')
@section('content')

<style>
    .form-control {
        position: relative;
    }

    .form-control input {
        border: none;
        box-sizing: border-box;
        outline: 0;
        padding: .75rem;
        width: 100%;
    }

    .form-control .calendar-icon {
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
    }

    input[type="date"]::-webkit-calendar-picker-indicator {
        background: transparent;
        bottom: 0;
        color: transparent;
        cursor: pointer;
        height: auto;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        width: auto;
    }
</style>

<div class="col-sm-12 col-lg-4 col-md-12">
    <label for="Tanggal">Start Date</label><span class="required">*</span>
    <div class="form-control">
        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
        <span class="calendar-icon">&#128197;</span>
    </div>
</div>

@endsection
