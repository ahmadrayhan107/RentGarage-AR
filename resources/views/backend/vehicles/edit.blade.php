@extends('backend.layouts.main')
@section('sideVhs', 'active')

@section('content')
    <div class="col-lg-6 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Vehicle</h1>
        </div>
        <form method="post" action="/vehicle-backend/{{ $vehicle->id }}">
            @method('PUT')
            @csrf

            <div class="form-group mb-5">
                <label>Username</label>
                <select class="form-control form-control-user" name="user_id">
                    @foreach ($users as $user)
                        @if ($vehicle->user_id == $user->id)
                            <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                        @else
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-5">
                <label>Vehicle Name</label>
                <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                    placeholder="Enter your vehicle name" value="{{ $vehicle->name, old('name') }}" name="name">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label>Plate Number</label>
                <input type="text" class="form-control form-control-user @error('plate_number') is-invalid @enderror"
                    placeholder="Enter your plate number" value="{{ $vehicle->plate_number, old('plate_number') }}" name="plate_number">
                @error('plate_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label>Vehicle Type</label>
                <select class="form-control form-control-user" name="vehicleType_id">
                    @foreach ($vehicleTypes as $vehicleType)
                        @if ($vehicle->vehicleType_id == $vehicleType->id)
                            <option value="{{ $vehicleType->id }}" selected>{{ $vehicleType->name }}</option>
                        @else
                            <option value="{{ $vehicleType->id }}">{{ $vehicleType->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
