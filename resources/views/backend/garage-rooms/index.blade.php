@extends('backend.layouts.main')
@section('sideGrm', 'active')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Garage Rooms</h1>

        <a href="/garageRoom-backend/create" class="btn btn-primary mb-3">
            <span class="icon text-white">
                <i class="fas fa-arrow-right"></i>
            </span>
            <span class="text">Create Garage Room</span>
        </a>

        @if (session()->has('pesan'))
            <div class="alert alert-success" role="alert">
                {{ session('pesan') }}
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table Garage Room</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Room code</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($garageRooms as $garageRoom)
                            <tr>
                                <td class="text-center">{{ $garageRooms->firstItem() + $loop->index }}</td>
                                <td class="text-center">{{ $garageRoom->room_code }}</td>
                                <td class="text-center">
                                    <a href="/garageRoom-backend/{{ $garageRoom->id }}/edit" class="btn btn-warning btn-circle">
                                        <i class="fas fa-fw fa-wrench"></i>
                                    </a>
                                    <form action="/garageRoom-backend/{{ $garageRoom->id }}" method="post" class="d-inline">
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
                    {{ $garageRooms->links() }}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
