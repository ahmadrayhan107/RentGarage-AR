@extends('backend.layouts.main')
@section('sideGrg', 'active')

@section('content')
    <div class="col-lg-6 mb-5">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Edit Garage</h1>
        </div>
        <form method="post" action="/garage-backend/{{ $garage->id }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group mb-5">
                <input type="hidden" name="image_old" value="{{ $garage->file_upload }}">
                <label>File Upload</label>
                @if ($garage->file_upload)
                    <img id="file-preview" src="/img/garages/{{ $garage->file_upload }}"
                        class="img-fluid col-sm-6 mb-3 d-block" height="100">
                @else
                    <img id="file-preview" class="img-fluid col-sm-6 mb-3 d-block" height="100">
                @endif
                <div>
                    <input type="file" name="file_upload" id="file_upload"">
                </div>
                @foreach ($errors->get('file_upload') as $message)
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @endforeach
            </div>

            <div class="form-group mb-5">
                <label>Room Code</label>
                <select class="form-control form-control-user @error('garageRoom_id') is-invalid @enderror"
                    name="garageRoom_id">
                    @foreach ($garageRooms as $garageRoom)
                        @if ($garage->garageRoom_id == $garageRoom->id)
                            <option value="{{ $garageRoom->id }}" selected>{{ $garageRoom->room_code }}</option>
                        @else
                            <option value="{{ $garageRoom->id }}">{{ $garageRoom->room_code }}</option>
                        @endif
                    @endforeach
                </select>
                @error('garageRoom_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label>Location</label>
                <select class="form-control form-control-user @error('garageLocation_id') is-invalid @enderror"
                    name="garageLocation_id">
                    @foreach ($garageLocations as $garageLocation)
                        @if ($garage->garageLocation_id == $garageLocation->id)
                            <option value="{{ $garageLocation->id }}" selected>
                                {{ $garageLocation->street_name . ' street No. ' . $garageLocation->address_number }}
                            </option>
                        @else
                            <option value="{{ $garageLocation->id }}">
                                {{ $garageLocation->street_name . ' street No. ' . $garageLocation->address_number }}
                            </option>
                        @endif
                    @endforeach
                </select>
                @error('garageLocation_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label>Type</label>
                <select class="form-control form-control-user @error('rentClass_id') is-invalid @enderror"
                    name="rentClass_id">
                    @foreach ($rentClasses as $rentClass)
                        @if ($garage->rentClass_id == $rentClass->id)
                            <option value="{{ $rentClass->id }}" selected>{{ $rentClass->type }}</option>
                        @else
                            <option value="{{ $rentClass->id }}">{{ $rentClass->type }}</option>
                        @endif
                    @endforeach
                </select>
                @error('rentClass_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="form-group mb-5">
                <label>Status</label>
                <select class="form-control form-control-user" name="status">
                    @php
                        $statuses = ['Available', 'Not Available'];
                        $values = [
                            'Available' => 1,
                            'Not Available' => 0,
                        ];
                    @endphp
                    @foreach ($statuses as $status)
                        @if (($garage->status == 1 ? 'Available' : 'Not Available') == $status)
                            <option value="{{ $values[$status] }}" selected>{{ $status }}</option>
                        @else
                            <option value="{{ $values[$status] }}">{{ $status }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control form-control-user" name="description" style="min-height: 200px;">{{ $garage->description, old('description') }}</textarea>
                @foreach ($errors->get('description') as $message)
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
