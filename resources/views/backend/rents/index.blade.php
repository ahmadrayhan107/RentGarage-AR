@extends('backend.layouts.main')
@section('sideRnt', 'active')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Rents</h1>

        <a href="/rent-backend/create" class="btn btn-primary mb-3">
            <span class="icon text-white">
                <i class="fas fa-arrow-right"></i>
            </span>
            <span class="text">Create Rent</span>
        </a>

        @if (session()->has('pesan'))
            <div class="alert alert-success" role="alert">
                {{ session('pesan') }}
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Rents</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Garage ID</th>
                                <th>Vehicle Name</th>
                                <th>Begin Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($rents as $rent)
                            <tr>
                                <td class="text-center">{{ $rents->firstItem() + $loop->index }}</td>
                                <td class="text-center">{{ 'Garage ID-' . $rent->garage->id }}</td>
                                <td class="text-center">{{ $rent->vehicle->name }}</td>
                                <td class="text-center">{{ $rent->begin_date }}</td>
                                <td class="text-center">{{ ($rent->end_date == null) ? 'Still Rent' : $rent->end_date }}</td>
                                <td class="text-center">
                                    <a href="/rent-backend/{{ $rent->id }}/edit" class="btn btn-warning btn-circle">
                                        <i class="fas fa-fw fa-wrench"></i>
                                    </a>
                                    <form action="/rent-backend/{{ $rent->id }}" method="post" class="d-inline">
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
                    {{ $rents->links() }}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
