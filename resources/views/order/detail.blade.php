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
                        <h1><b>Create Users</b></h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="{{ route('store_user') }}" method="POST" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">First Name</label>
                                            <input type="text" id="inputName" name="name" readonly value= {{ $checkout_detals1->first_name }} required
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Last Name</label>
                                            <input type="text" id="inputName"readonly value= {{ $checkout_detals1->last_name }}  name="username" required
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName"> Email</label>
                                            <input type="email" id="inputName" readonly value= {{ $checkout_detals1->email }} name="email" required
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Address</label>
                                            <input type="text" id="inputName" readonly value= {{ $checkout_detals1->address }} name="password" required
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">City</label>
                                            <input type="text" id="inputName" readonly value= {{ $checkout_detals1->city }} name="contact" required
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Country</label>
                                            <input type="text" id="inputName" readonly value= {{ $checkout_detals1->country }} name="contact" required
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Zip Code</label>
                                            <input type="text" id="inputName" readonly value= {{ $checkout_detals1->zip_code }} name="contact" required
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Phone</label>
                                            <input type="text" id="inputName" readonly value= {{ $checkout_detals1->tel }} name="contact" required
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Amount</label>
                                            <input type="text" id="inputName" readonly value= {{ $checkout_detals1->amount }} name="contact" required
                                                class="form-control">
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
                    <h1>Order Product </h4>
                    <div class="col-md-12">
                        <div class="card card-primary">

                            <div class="card-body">
                                <div class="row">
                                    @foreach ($checkout_detals2 as $item)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Product Name</label>
                                            <p>{{ $item->getProducts->name }}</p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="inputName">Product Image</label>
                                            <img style="    width: 100px;
                                            height: 100px;" src="{{ asset('product_thumbnail/'.$item->getProducts->thumbnail) }}">

                                        </div>
                                    </div>
                                    @endforeach

                                </div>







                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('orders') }}" class="btn btn-secondary">Cancel</a>
                        {{-- <button class="btn btn-secondary float-right" type="submit">Create</button> --}}
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
