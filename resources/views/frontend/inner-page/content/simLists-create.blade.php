@extends('frontend.inner-page.layouts.main')
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
                                    <h1 class="h4 text-gray-900 mb-4">Insert Sim</h1>
                                </div>

                                <form method="post" action="/simLists">
                                    @csrf

                                    <div class="form-group mb-5">
                                        <label>SIM Number</label>
                                        <input type="text"
                                            class="form-control form-control-user @error('number') is-invalid @enderror"
                                            placeholder="1234-1234-123456" value="{{ old('number') }}" name="number">
                                        @error('number')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-5">
                                        <label>Class</label>
                                        <select class="form-select" name="class">
                                            @php
                                                $classes = ['SIM A', 'SIM B1', 'SIM B2', 'SIM C', 'SIM D'];
                                            @endphp
                                            @foreach ($classes as $class)
                                                @if (old('class') == $class)
                                                    <option value="{{ $class }}" selected>{{ $class }}
                                                    </option>
                                                @else
                                                    <option value="{{ $class }}">{{ $class }}</option>
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
