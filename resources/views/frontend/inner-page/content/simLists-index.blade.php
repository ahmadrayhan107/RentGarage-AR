@extends('frontend.inner-page.layouts.main')
@section('navUsr', 'active')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid my-5">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">SIM Lists</h1>

        <a href="/simLists/create" class="btn btn-primary mb-3">
            <span class="icon text-white">
                <i class="fas fa-arrow-right"></i>
            </span>
            <span class="text">Create SIM</span>
        </a>

        @if (session()->has('pesan'))
            <div class="alert alert-success" role="alert">
                {{ session('pesan') }}
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Table SIM Lists</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Number</th>
                                <th>Class</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($simLists as $simList)
                            <tr>
                                <td class="text-center">{{ $simLists->firstItem() + $loop->index }}</td>
                                <td class="text-center">{{ $simList->number }}</td>
                                <td class="text-center">{{ $simList->class }}</td>
                                <td class="text-center">
                                    <a href="/simLists/{{ $simList->id }}/edit" class="btn btn-warning btn-circle">
                                        <i class="fas fa-fw fa-wrench"></i>
                                    </a>
                                    <form action="/simLists/{{ $simList->id }}" method="post" class="d-inline">
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
                    {{ $simLists->links() }}
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection
