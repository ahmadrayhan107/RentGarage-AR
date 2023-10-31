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
                                    <h1 class="h4 text-gray-900 mb-4">Profile</h1>
                                </div>

                                <form method="post" action="/profile">
                                    @csrf

                                    <div class="form-group mb-5">
                                        <label>First Name</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('first_name') is-invalid @enderror"
                                            placeholder="Enter your first name" value="{{ old('first_name') }}"
                                            name="first_name">
                                        @error('first_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-5">
                                        <label>Last Name</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('last_name') is-invalid @enderror"
                                            placeholder="Enter your last name" value="{{ old('last_name') }}"
                                            name="last_name">
                                        @error('last_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-5">
                                        <label>NIK</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('nik') is-invalid @enderror"
                                            placeholder="Enter your NIK" value="{{ old('nik') }}" name="nik">
                                        @error('nik')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-5">
                                        <label>Phone Number</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('phone_number') is-invalid @enderror"
                                            placeholder="Enter your phone number" value="{{ old('phone_number') }}"
                                            name="phone_number">
                                        @error('phone_number')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-5">
                                        <label>Gender</label>
                                        <select class="form-select" name="gender">
                                            @php
                                                $genders = ['Male', 'Female'];
                                            @endphp
                                            @foreach ($genders as $gender)
                                                @if (old('gender') == $gender)
                                                    <option value="{{ $gender }}" selected>{{ $gender }}</option>
                                                @else
                                                    <option value="{{ $gender }}">{{ $gender }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @foreach ($errors->get('gender') as $message)
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control form-control-user" name="address" style="min-height: 200px;">{{ old('address') }}</textarea>
                                        @foreach ($errors->get('address') as $message)
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @endforeach
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
