@extends('layout.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @if ($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1><b>Create Product</b></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{ route('update_product',$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Product Name</label>
                                            <input type="text" id="inputName" value="{{ $product->name }}"
                                                name="product_name" required class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Status</label>
                                            <select class="form-control select2" name="product_category"
                                                style="width: 100%;">
                                                <option selected="selected" required>Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" <?php if ($category->id == $product->category_id) {
                                                        echo 'selected';
                                                    } ?>>
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Status</label>
                                            <select class="form-control select2" name="product_status" style="width: 100%;">
                                                <option selected="selected" required>Select Product Status</option>
                                                <option value="Active" <?php if ($product->status == 'Active') {
                                                    echo 'selected';
                                                } ?>>Active</option>
                                                <option value="Inactive" <?php if ($product->status == 'Inative') {
                                                    echo 'selected';
                                                } ?>>Inactive</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputDescription">Product Description</label>
                                            <textarea id="summernote" required name="product_description">
                                                {{ $product->description }}
                                              </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Product Quantity</label>
                                            <input type="text" id="inputName" value="{{ $product->quantity }}"
                                                name="product_quantity" required class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Product Pirce</label>
                                            <input type="text" id="inputName" value="{{ $product->price }}"
                                                name="product_price" required class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Product Thumbnail</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="product_thumbnail"
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
                                        <img style="width: 100px; height: 100px;"
                                            src="{{ asset('product_thumbnail/' . $product->thumbnail) }}">
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Product Multiple Images</label>


                                            <input type="file" class="input-group" name="product_image[]" multiple>



                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2">
                                        <div class="row">
                                            @foreach ($product_image as $key => $image)
                                                <div class="col-md-6">
                                                    <img style="width: 100px; height: 100px;"
                                                        src="{{ asset('product_image/' . $image->image) }}">
                                                </div>
                                            @endforeach
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
                        <a href="{{ route('products') }}" class="btn btn-secondary">Cancel</a>
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
