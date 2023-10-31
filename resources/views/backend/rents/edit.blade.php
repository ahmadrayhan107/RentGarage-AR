@extends('backend.layouts.main')
@section('sideRnt', 'active')

@section('content')
    <div class="col-lg-6 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Rent</h1>
        </div>
        <form method="post" action="/rent-backend/{{ $rent->id }}">
            @method('PUT')
            @csrf

            <div class="form-group mb-5">
                <label>Renter Name</label>
                <select class="form-control form-control-user" name="renter_id">
                    @foreach ($renters as $renter)
                        @if ($rent->renter_id == $renter->id)
                            <option value="{{ $renter->id }}" selected>{{ $renter->first_name . ' ' . $renter->last_name }}
                            </option>
                        @else
                            <option value="{{ $renter->id }}">{{ $renter->first_name . ' ' . $renter->last_name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-5">
                <label>Location</label>
                <select class="form-control form-control-user" name="vehicle_id">
                    @foreach ($vehicles as $vehicle)
                        @if ($rent->vehicle_id == $vehicle->id)
                            <option value="{{ $vehicle->id }}" selected>{{ $vehicle->name }}</option>
                        @else
                            <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-5">
                <label>SIM</label>
                <select class="form-control form-control-user" name="sim_id">
                    @foreach ($simLists as $simList)
                        @if ($rent->sim_id == $simList->id)
                            <option value="{{ $simList->id }}" selected>{{ $simList->number }}</option>
                        @else
                            <option value="{{ $simList->id }}">{{ $simList->number }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-5">
                <label>Garage</label>
                <select class="form-control form-control-user" name="garage_id">
                    @foreach ($garages as $garage)
                        @if ($rent->garage_id == $garage->id)
                            <option value="{{ $garage->id }}" selected>{{ 'Garage ID-' . $garage->id }}</option>
                        @else
                            <option value="{{ $garage->id }}">{{ 'Garage ID-' . $garage->id }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
