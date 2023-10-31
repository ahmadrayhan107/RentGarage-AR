@extends('backend.layouts.main')
@section('sideRts', 'active')

@section('content')
    <div class="col-lg-6 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Insert Renter</h1>
        </div>
        <form method="post" action="/renter-backend">
            @csrf

            <div class="form-group mb-5">
                <label>Username</label>
                <select class="form-control form-control-user @error('user_id') is-invalid @enderror" name="user_id">
                    @foreach ($users as $user)
                        @if (old('user_id') == $user->id)
                            <option value="{{ $user->id }}" selected>{{ $user->name }}</option>
                        @else
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('user_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label>First Name</label>
                <input type="text" class="form-control form-control-user @error('first_name') is-invalid @enderror"
                    placeholder="Enter your first name" value="{{ old('first_name') }}" name="first_name">
                @error('first_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label>Last Name</label>
                <input type="text" class="form-control form-control-user @error('last_name') is-invalid @enderror"
                    placeholder="Enter your last name" value="{{ old('last_name') }}" name="last_name">
                @error('last_name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label>NIK</label>
                <input type="text" class="form-control form-control-user @error('nik') is-invalid @enderror"
                    placeholder="Enter your NIK" value="{{ old('nik') }}" name="nik">
                @error('nik')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label>Phone Number</label>
                <input type="text" class="form-control form-control-user @error('phone_number') is-invalid @enderror"
                    placeholder="Enter your phone number" value="{{ old('phone_number') }}" name="phone_number">
                @error('phone_number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label>Gender</label>
                <select class="form-control form-control-user" name="gender" value="{{ old('gender') }}">
                    <option value="Laki-Laki" selected>Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
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
@endsection
