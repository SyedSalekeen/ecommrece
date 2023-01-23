@extends('layout.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><b>Add Permsissions</b></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{ route('submit_permission') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Role</label>
                                            <input type="text" readonly id="inputName" value="Product Manager"
                                                name="role" required class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Permssions</label>
                                            <br>
                                            <p>Add User:</p> <input type="checkbox" id="inputName" value="Add User"
                                                name="permissions[]">

                                            <br>
                                            <p>Edit User:</p> <input type="checkbox" id="inputName" value="Edit User"
                                                name="permissions[]">
                                            <br>
                                            <p>Delete User:</p> <input type="checkbox" id="inputName" value="Delete User"
                                                name="permissions[]">

                                            <br>
                                            <p>Add Product:</p> <input type="checkbox" id="inputName" value="Add Product"
                                                name="permissions[]">

                                            <br>
                                            <p>Edit Product:</p> <input type="checkbox" id="inputName" value="Edit Product"
                                                name="permissions[]">

                                            <br>
                                            <p>Delete Product:</p> <input type="checkbox" id="inputName"
                                                value="Delete Product" name="permissions[]">

                                            <p>Add Catgeory:</p> <input type="checkbox" id="inputName" value="Add Catgeory"
                                                name="permissions[]">

                                            <br>
                                            <p>Edit Category:</p> <input type="checkbox" id="inputName"
                                                value="Edit Category" name="permissions[]">

                                            <br>
                                            <p>Delete Category:</p> <input type="checkbox" id="inputName"
                                                value="Delete Category" name="permissions[]">
                                            <p>Edit Reviews:</p> <input type="checkbox" id="inputName" value="Edit Reviews"
                                                name="permissions[]">
                                            <p>Delete Reviews:</p> <input type="checkbox" id="inputName"
                                                value="Delete Reviews" name="permissions[]">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('reviews') }}" class="btn btn-secondary">Cancel</a>
                        <button class="btn btn-secondary float-right" type="submit">Update</button>
                    </div>
                </div>
            </form>

        </section>
        <!-- /.content -->
    </div>
@endsection
@section('script')
    <script>
        $('#summernote').summernote()
    </script>
@endsection
