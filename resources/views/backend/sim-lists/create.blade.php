@extends('backend.layouts.main')
@section('sideSls', 'active')

@section('content')
    <div class="col-lg-6 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Insert SIM List</h1>
        </div>
        <form method="post" action="/simList-backend">
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
                <label>SIM Number</label>
                <input type="text" class="form-control form-control-user @error('number') is-invalid @enderror"
                    placeholder="1234-1234-123456" value="{{ old('number') }}" name="number">
                @error('number')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label>Class</label>
                <select class="form-control form-control-user" name="class">
                    @php
                        $classes = ['SIM A', 'SIM B1', 'SIM B2', 'SIM C', 'SIM D'];
                    @endphp
                    @foreach ($classes as $class)
                        @if (old('class') == $class)
                            <option value="{{ $class }}" selected>{{ $class }}</option>
                        @else
                            <option value="{{ $class }}">{{ $class }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
