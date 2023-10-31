@extends('backend.layouts.main')
@section('sideUsr', 'active')

@section('content')
    <div class="col-lg-6 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Insert User</h1>
        </div>
        <form method="post" action="/user-backend">
            @csrf

            <div class="form-group mb-5">
                <label>Name</label>
                <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                    placeholder="Enter your name" value="{{ old('name') }}" name="name">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label>Email</label>
                <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                    placeholder="example@email.com" value="{{ old('email') }}" name="email">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label>Password</label>
                <input type="password" class="form-control form-control-user" name="password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group">
                <label>Admin</label>
                <select class="form-control form-control-user" name="isAdmin">
                    <option value="0" selected>No Akses</option>
                    <option value="1">Akses</option>
                </select>
            </div>

            @foreach ($errors->get('password') as $message)
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
