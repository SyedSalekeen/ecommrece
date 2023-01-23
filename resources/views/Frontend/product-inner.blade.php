@include('Frontend.layout.head')

<body>
    @include('Frontend.layout.header')

    @include('sweetalert::alert')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <input type="hidden" value="{{ csrf_token() }}" name="_token" id="token">

                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{ asset('product_thumbnail/' . $product->thumbnail) }}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>{{ $product->name }}

                        </div>
                    </div>
                </div>





            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->



    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Product Details</h3>
                        <div class="row">
                            <div class="col-md-3">
                                <h5>Product Name</h5>
                                <p>{{ $product->name }}</p>
                            </div>

                            <div class="col-md-3">
                                <h5>Product Price</h5>
                                <p>${{ $product->price }}</p>
                            </div>

                            <div class="col-md-3">
                                <h5>Product Description</h5>
                                <p>{{ $product->description }}</p>
                            </div>

                            <div class="col-md-3">
                                <h5>Product Quantity</h5>
                                <p>{{ $product->quantity }}</p>
                            </div>




                        </div>
                    </div>
                </div>
                <!-- /section title -->



                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Product Images</h3>
                        <div class="row">
                            @foreach ($product_images as $image)
                                <div class="col-md-4">
                                    <div class="shop">
                                        <div class="shop-img">
                                            <img src="{{ asset('product_image/' . $image->image) }}" alt="">
                                        </div>

                                    </div>
                                </div>
                            @endforeach






                        </div>
                    </div>
                </div>
                <!-- /section title -->



                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Product Reviews</h3>
                        <div class="row">
                            <div class="col-md-12">
                                @auth
                                    <form method="POST" action="{{ route('submit_review') }}">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="text" class="form-input" name="comment">
                                        <button type="submit">Add Review</button>
                                    </form>
                                @endauth

                                @foreach ($reviews as $review)
                                <div class="col-md-12 " style="padding: 15px;">
                                    <h5>{{ $review->user->username }}</h5>
                                    <p>{{ $review->review }}</p>
                                    <p>------------------------</p>
                                </div>
                                @endforeach
                            </div>




                        </div>
                    </div>
                </div>
                <!-- /section title -->



            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


    <!-- /NEWSLETTER -->
    @include('Frontend.layout.footer')

</body>

</html>
