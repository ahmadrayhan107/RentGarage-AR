@extends('backend.layouts.main')
@section('sideGlc', 'active')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Garage Locations</h1>

        <a href="/garageLocation-backend/create" class="btn btn-primary mb-3">
            <span class="icon text-white">
                <i class="fas fa-arrow-right"></i>
            </span>
            <span class="text">Create Garage Location</span>
        </a>

        @if (session()->has('pesan'))
            <div class="alert alert-success" role="alert">
                {{ session('pesan') }}
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Garage Locations</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Street Name</th>
                                <th>Address Number</th>
                                <th>City</th>
                                <th>Province</th>
                                <th>Postal Code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($garageLocations as $garageLocation)
                            <tr>
                                <td class="text-center">{{ $garageLocations->firstItem() + $loop->index }}</td>
                                <td>{{ $garageLocation->street_name . ' street'}}</td>
                                <td class="text-center">{{ 'No. ' . $garageLocation->address_number }}</td>
                                <td>{{ $garageLocation->city }}</td>
                                <td>{{ $garageLocation->province }}</td>
                                <td class="text-center">{{ $garageLocation->postal_code }}</td>
                                <td class="text-center">
                                    <a href="/garageLocation-backend/{{ $garageLocation->id }}/edit" class="btn btn-warning btn-circle">
                                        <i class="fas fa-fw fa-wrench"></i>
                                    </a>
                                    <form action="/garageLocation-backend/{{ $garageLocation->id }}" method="post" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-circle"
                                            onclick="return confirm('Are you sure ?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    {{ $garageLocations->links() }}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
