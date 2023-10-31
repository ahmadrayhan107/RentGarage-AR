@extends('backend.layouts.main')
@section('sideVty', 'active')

@section('content')
    <div class="col-lg-6 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Vehicle Types</h1>
        </div>
        <form method="post" action="/vehicleType-backend/{{ $vehicleType->id }}">
            @method('PUT')
            @csrf

            <div class="form-group mb-5">
                <label>Vehicle Type Name</label>
                <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                    placeholder="Enter your vehicle type name" value="{{ $vehicleType->name, old('name') }}" name="name">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control form-control-user" name="description" style="min-height: 200px;">{{ $vehicleType->description, old('description') }}</textarea>
                @foreach ($errors->get('description') as $message)
                    <div class="alert alert-danger">
                        {{ $message }}s
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
