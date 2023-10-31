@extends('frontend.inner-page.layouts.main')

@section('title', 'Profile')
@section('navUsr', 'active')

@section('content')

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="p-5">

                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Insert Vehicle</h1>
                                </div>

                                <form method="post" action="/vehicles">
                                    @csrf

                                    <div class="form-group mb-5">
                                        <label>Vehicle Name</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('name') is-invalid @enderror"
                                            placeholder="Enter your vehicle name" value="{{ old('name') }}"
                                            name="name">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-5">
                                        <label>Plate Number</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('plate_number') is-invalid @enderror"
                                            placeholder="Enter your plate number" value="{{ old('plate_number') }}"
                                            name="plate_number">
                                        @error('plate_number')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-5">
                                        <label>Vehicle Type</label>
                                        <select class="form-select" name="vehicleType_id">
                                            @foreach ($vehicleTypes as $vehicleType)
                                                @if (old('vehicleType_id') == $vehicleType->id)
                                                    <option value="{{ $vehicleType->id }}" selected>{{ $vehicleType->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $vehicleType->id }}">{{ $vehicleType->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
