@extends('layout.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><b>Create Catgeory</b></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{ route('update_category',$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Catgeory Name</label>
                                            <input type="text" id="inputName" value="{{ $category->name }}" name="category_name" required
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Catgeory Status</label>
                                            <select class="form-control select2" name="category_status"
                                                style="width: 100%;">
                                                <option selected="selected" required>Select Category Status</option>
                                                <option value="Active" <?php if($category->status == "Active") echo "selected"; ?>>Active</option>
                                                <option value="Inactive" <?php if($category->status == "Inctive") echo "selected"; ?>>Inactive</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputDescription">Catgeory Description</label>
                                            <textarea id="summernote" required name="category_description">
                                                {!! $category->name !!}
                                              </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">File input</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file"  name="category_image"
                                                        class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <img style="    height: 150px;
                                            width: 200px;" src="{{ asset('category_image/'.$category->image) }}">
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
                        <a href="{{ route('categories') }}" class="btn btn-secondary">Cancel</a>
                        <button class="btn btn-secondary float-right" type="submit">Create Catgeory</button>
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
