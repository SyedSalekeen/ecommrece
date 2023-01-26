<?php if (auth()->user()->type == 2) {
    $edit_user = App\Models\RolePermission::where('permission', 'Edit Reviews')->first();
    $delete_user = App\Models\RolePermission::where('permission', 'Delete Reviews')->first();
} ?>
@extends('layout.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><b>Reviews</b></h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-md-10">

                    </div>
                    {{-- <div class="col-md-2 mb-2">
                        <a href="{{ route('create_category') }}">
                            <button type="button" class="btn btn-block btn-dark">Add Category</button>
                        </a>
                    </div> --}}
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">


                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Added By</th>
                                            <th>Review</th>
                                            <th>Product</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reviews as $item)
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->user->username }}</td>
                                                <td>{{ $item->review }}</td>
                                                <td>{{ $item->product->name }}</td>

                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default">Action</button>
                                                        <button type="button"
                                                            class="btn btn-default dropdown-toggle dropdown-icon"
                                                            data-toggle="dropdown">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" role="menu">

                                                            @if (auth()->user()->type == 2)
                                                                @if ($edit_user !== null)
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('edit_review', $item->id) }}">Edit</a>
                                                                @endif
                                                            @else
                                                                <a class="dropdown-item"
                                                                    href="{{ route('edit_review', $item->id) }}">Edit</a>
                                                            @endif



                                                            @if (auth()->user()->type == 2)
                                                                @if ($delete_user !== null)
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('delete_review', $item->id) }}"
                                                                        onclick="return confirm('Are you sure you want to delete this vendor?');">Delete</a>
                                                                @endif
                                                            @else
                                                                <a class="dropdown-item"
                                                                    href="{{ route('delete_review', $item->id) }}"
                                                                    onclick="return confirm('Are you sure you want to delete this vendor?');">Delete</a>
                                                            @endif




                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>

                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                <!-- Main row -->

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('script')
    <script>
        @if (Session::has('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ session('success') }}");
        @endif

        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
