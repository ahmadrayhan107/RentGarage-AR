@extends('backend.layouts.main')
@section('sideGrm', 'active')

@section('content')
    <div class="col-lg-6 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Insert Garage Room</h1>
        </div>
        <form method="post" action="/garageRoom-backend">
            @csrf

            <div class="form-group mb-5">
                <label>Room Code</label>
                <input type="text" class="form-control form-control-user @error('room_code') is-invalid @enderror"
                    placeholder="Enter like this R-001" value="{{ old('room_code') }}" name="room_code">
                @error('room_code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
