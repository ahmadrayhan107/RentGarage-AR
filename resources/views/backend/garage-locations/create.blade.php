@extends('backend.layouts.main')
@section('sideGlc', 'active')

@section('content')
    <div class="col-lg-6 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Insert Garage Location</h1>
        </div>
        <form method="post" action="/garageLocation-backend">
            @csrf

            <div class="form-group mb-5">
                <label>Street Name</label>
                <input type="text" class="form-control form-control-user @error('street_name') is-invalid @enderror"
                    placeholder="Enter the street name" value="{{ old('street_name') }}" name="street_name">
                @error('street_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            
            <div class="form-group mb-5">
                <label>Address Number</label>
                <input type="text" class="form-control form-control-user @error('address_number') is-invalid @enderror"
                    placeholder="Enter the address number" value="{{ old('address_number') }}" name="address_number">
                @error('address_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label>City</label>
                <input type="text" class="form-control form-control-user @error('city') is-invalid @enderror"
                    placeholder="Enter the city" value="{{ old('city') }}" name="city">
                @error('city')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label>Province</label>
                <input type="text" class="form-control form-control-user @error('province') is-invalid @enderror"
                    placeholder="Enter the province" value="{{ old('province') }}" name="province">
                @error('province')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label>Postal Code</label>
                <input type="text" class="form-control form-control-user @error('postal_code') is-invalid @enderror"
                    placeholder="Enter the postal code" value="{{ old('postal_code') }}" name="postal_code">
                @error('postal_code')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
