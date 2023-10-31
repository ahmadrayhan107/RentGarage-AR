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
                                    <h1 class="h4 text-gray-900 mb-4">Rent</h1>
                                </div>

                                <form method="post" action="/rent">
                                    @csrf

                                    <div class="form-group mb-5">
                                        <label>Vehicle Name</label>
                                        <select class="form-select" name="vehicle_id">
                                            @foreach ($vehicles as $vehicle)
                                                @if (old('vehicle_id') == $vehicle->id)
                                                    <option value="{{ $vehicle->id }}" selected>{{ $vehicle->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group mb-5">
                                        <label>SIM</label>
                                        <select class="form-select" name="sim_id">
                                            @foreach ($simLists as $simList)
                                                @if (old('sim_id') == $simList->id)
                                                    <option value="{{ $simList->id }}" selected>{{ $simList->class }}
                                                    </option>
                                                @else
                                                    <option value="{{ $simList->id }}">{{ $simList->class }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    @foreach ($renters as $renter)
                                        <input type="hidden" name="renter_id" value="{{ $renter->id }}">
                                    @endforeach

                                    <input type="hidden" name="garage_id" value="{{ $garage->id }}">

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
