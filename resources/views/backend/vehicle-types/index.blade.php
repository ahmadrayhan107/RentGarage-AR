@extends('backend.layouts.main')
@section('sideVty', 'active')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Vehicle Types</h1>

        <a href="/vehicleType-backend/create" class="btn btn-primary mb-3">
            <span class="icon text-white">
                <i class="fas fa-arrow-right"></i>
            </span>
            <span class="text">Create Vehicle Type</span>
        </a>

        @if (session()->has('pesan'))
            <div class="alert alert-success" role="alert">
                {{ session('pesan') }}
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Vehicle Types</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($vehicleTypes as $vehicleType)
                            <tr>
                                <td class="text-center">{{ $vehicleTypes->firstItem() + $loop->index }}</td>
                                <td class="text-center">{{ $vehicleType->name }}</td>
                                <td class="text-center">
                                    <a href="/vehicleType-backend/{{ $vehicleType->id }}/edit" class="btn btn-warning btn-circle">
                                        <i class="fas fa-fw fa-wrench"></i>
                                    </a>
                                    <form action="/vehicleType-backend/{{ $vehicleType->id }}" method="post" class="d-inline">
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
                    {{ $vehicleTypes->links() }}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
