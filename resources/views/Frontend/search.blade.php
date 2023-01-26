@include('Frontend.layout.head')

<body>
    @include('Frontend.layout.header')
    @include('Frontend.layout.nav')
    @include('sweetalert::alert')


    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Search Results</h3>

                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                    @foreach ($serchProduct as $products)
                                        <!-- product -->
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{ asset('product_thumbnail/' . $products->thumbnail) }}"
                                                    alt="">
                                                <div class="product-label">
                                                    <span class="sale">-30%</span>
                                                    <span class="new">NEW</span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">Category</p>
                                                <h3 class="product-name"><a href="#">{{ $products->name }}</a>
                                                </h3>
                                                <h4 class="product-price">${{ $products->price }}</h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <div class="product-btns">
                                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><a
                                                            href="{{ route('add_to_wishlet', $products->id) }}"><span
                                                                class="tooltipp">add to wishlist</span></a></button>

                                                    <button class="quick-view"><i class="fa fa-eye"></i> <a
                                                            href="{{ route('product_inner', $products->id) }}"><span
                                                                class="tooltipp">quick view</a></span></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <a href="{{ route('add_to_cart', $products->id) }}"><button
                                                        class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add
                                                        to cart</button></a>


                                            </div>
                                        </div>
                                        <!-- /product -->
                                    @endforeach

                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Website <strong>FEEDBACK</strong></p>
                        <form method="POST" action="{{ route('feedback') }}">
                            @csrf
                            <input class="input" type="text" name="feedback" placeholder="Enter your feedback here">
                            <button class="newsletter-btn" type="submit">Submit</button>
                        </form>
                        <ul class="newsletter-follow">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->
    @include('Frontend.layout.footer')

</body>

</html>
