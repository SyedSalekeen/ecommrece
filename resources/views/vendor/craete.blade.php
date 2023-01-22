@extends('layout.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><b>Create Vendor</b></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{route('save_vendor')}}" method="POST">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">First Name</label>
                                        <input type="text" id="inputName" name="first_name" required class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Last Name</label>
                                        <input type="text" id="inputName" name="last_name" required class="form-control">
                                    </div>
                                </div>

                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Email Address</label>
                                        <input type="email" id="inputName" name="email_address" class="form-control">
                                    </div>
                                </div> --}}

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputName">Contact Number</label>
                                        <input type="number" id="inputName" name="contact_number" required class="form-control">
                                    </div>
                                </div>


                                

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputDescription">Vendor Description</label>
                                        <textarea id="inputDescription" name="vendor_description" required class="form-control" rows="4"></textarea>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputDescription">Vendor Type</label>
                                        <input type="text" id="inputName" name="vendor_type" required class="form-control">
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
                    <a href="{{route('vendor')}}" class="btn btn-secondary">Cancel</a>
                    <button  class="btn btn-success float-right" type="submit">Create Vendor</button>
                </div>
            </div>
        </form>

        </section>
        <!-- /.content -->
    </div>
@endsection
