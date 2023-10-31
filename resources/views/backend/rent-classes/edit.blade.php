@extends('backend.layouts.main')
@section('sideRcl', 'active')

@section('content')
    <div class="col-lg-6 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Rent Class</h1>
        </div>
        <form method="post" action="/rentClass-backend/{{ $rentClass->id }}">
            @method('PUT')
            @csrf

            <div class="form-group mb-5">
                <label>Type</label>
                <input type="text" class="form-control form-control-user @error('type') is-invalid @enderror"
                    placeholder="Enter the type" value="{{ $rentClass->type, old('type') }}" name="type">
                @error('type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label>Cost</label>
                <input type="text" class="form-control form-control-user @error('cost') is-invalid @enderror"
                    placeholder="Enter the cost" value="{{ $rentClass->cost, old('cost') }}" name="cost">
                @error('cost')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
