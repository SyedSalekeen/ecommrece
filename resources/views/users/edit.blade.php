@extends('layout.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                @if ($errors->any())
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                @endif
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><b>Edit User</b></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{ route('update_user',$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Name</label>
                                            <input type="text" id="inputName" value="{{ $user->name }}" name="name" required
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">User Name</label>
                                            <input type="text" id="inputName" name="username" value="{{ $user->username }}" required
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">User Email</label>
                                            <input type="email" id="inputName" name="email" value="{{ $user->email }}" required
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">User Password</label>
                                            <input type="password" id="inputName" name="password"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">User Contact Number</label>
                                            <input type="number" id="inputName" name="contact" value="{{ $user->contact }}" required
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>User Status</label>
                                            <select class="form-control select2" name="status" style="width: 100%;">
                                                <option selected="selected" required>Select User Status</option>
                                                <option value="Active" <?php if($user->status == "Active")  echo "selected";?>>Active</option>
                                                <option value="Inactive" <?php if($user->status == "Inctive")  echo "selected";?>>Inactive</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>User Role</label>
                                            <select class="form-control select2" name="role" style="width: 100%;">
                                                <option selected="selected" required>Select User Role</option>
                                                <option value="User" <?php if($user->role == "User")  echo "selected";?>>User</option>
                                                <option value="Product Manager" <?php if($user->role == "Product Manager")  echo "selected";?>>Product Manager</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputDescription">User Address</label>
                                            <textarea id="summernote" required name="address">
                                                {!! $user->address !!}
                                              </textarea>
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
                        <a href="{{ route('users') }}" class="btn btn-secondary">Cancel</a>
                        <button class="btn btn-secondary float-right mb-5 mt-2" type="submit">Update</button>
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
