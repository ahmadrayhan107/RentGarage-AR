@extends('backend.layouts.main')
@section('sideGrg', 'active')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Garages</h1>

        <a href="/garage-backend/create" class="btn btn-primary mb-3">
            <span class="icon text-white">
                <i class="fas fa-arrow-right"></i>
            </span>
            <span class="text">Create Garage</span>
        </a>

        @if (session()->has('pesan'))
            <div class="alert alert-success" role="alert">
                {{ session('pesan') }}
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Garages</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Room Code</th>
                                <th>Location</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($garages as $garage)
                            <tr>
                                <td class="text-center">{{ $garages->firstItem() + $loop->index }}</td>
                                <td class="text-center">{{ $garage->garageRoom->room_code }}</td>
                                <td class="text-center">{{ $garage->garageLocation->street_name . ' street No ' . $garage->garageLocation->address_number }}</td>
                                <td class="text-center">{{ $garage->rentClass->type }}</td>
                                <td class="text-center">{{ ($garage->status == true) ? 'Available' : 'Not Available'  }}</td>
                                <td class="text-center">
                                    <a href="/garage-backend/{{ $garage->id }}/edit" class="btn btn-warning btn-circle">
                                        <i class="fas fa-fw fa-wrench"></i>
                                    </a>
                                    <form action="/garage-backend/{{ $garage->id }}" method="post" class="d-inline">
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
                    {{ $garages->links() }}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
