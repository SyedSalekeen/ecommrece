 <!-- HEADER -->
 <?php
 $products = App\Models\Cart::where('user_id', auth()->id())
     ->with('getProducts')
     ->get();
 $countProduct = count($products);
 $productPriceCount = 0;
 foreach ($products as $key => $productPrice) {
     $productPriceCount = $productPriceCount + $productPrice->getProducts->price;
 }

 $wshletProducts = App\Models\Wishlet::where('user_id', auth()->id())
     ->with('getProducts')
     ->get();
 $countWishletProducst = count($wshletProducts);

 ?>
 <header>
     <!-- TOP HEADER -->
     <div id="top-header">
         <div class="container">
             <ul class="header-links pull-left">
                 <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                 <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                 <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
             </ul>
             <ul class="header-links pull-right">
                 @guest
                     <li><a href="{{ route('login_user') }}"><i class="fa fa-user-o"></i>Login</a></li>
                 @endguest
                 @auth
                     <li><a href="{{ route('profile') }}"><i class="fa fa-dollar"></i>My Profile</a></li>

                     <li><a href="{{ route('logout_user') }}"><i class="fa fa-user-o"></i>Logout</a></li>

                 @endauth

             </ul>
         </div>
     </div>
     <!-- /TOP HEADER -->

     <!-- MAIN HEADER -->
     <div id="header">
         <!-- container -->
         <div class="container">
             <!-- row -->
             <div class="row">
                 <!-- LOGO -->
                 <div class="col-md-3">
                     <div class="header-logo">
                         <a href="{{ route('website') }}" class="logo">
                             <h3
                                 style="    color: #fff;
                            font-weight: bold;
                            font-size: 30px;">
                                 Ecommerce</h3>
                             {{-- <img src="{{ url('frontend/img/logo.png') }}" alt=""> --}}
                         </a>
                     </div>
                 </div>
                 <!-- /LOGO -->

                 <!-- SEARCH BAR -->
                 <div class="col-md-6">
                     <div class="header-search">
                         <form>
                             <select class="input-select">
                                 <option value="0">All Categories</option>
                                 <option value="1">Category 01</option>
                                 <option value="1">Category 02</option>
                             </select>
                             {{-- <input class="input" placeholder="Search here"> --}}
                             <button class="search-btn">Search</button>
                         </form>
                     </div>
                 </div>
                 <!-- /SEARCH BAR -->

                 <!-- ACCOUNT -->
                 <div class="col-md-3 clearfix">
                     <div class="header-ctn">
                         @auth
                             <!-- Wishlist -->
                              <div class="dropdown">
                                 <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                     <i class="fa fa-heart-o"></i>
                                     <span>Your Wishlist</span>
                                     <div class="qty">{{ $countWishletProducst }}</div>
                                 </a>



                                 <div class="cart-dropdown">
                                    <div class="cart-list">

                                        @foreach ($wshletProducts as $product)
                                            <div class="product-widget">
                                                <div class="product-img">
                                                    <img src="{{ asset('product_thumbnail/' . $product->getProducts->thumbnail) }}"
                                                        alt="">
                                                </div>
                                                <div class="product-body">
                                                    <h3 class="product-name"><a
                                                            href="#">{{ $product->getProducts->name }}</a>
                                                    </h3>

                                                </div>
                                                <button class="delete deleteWishlet" data-id="{{ $product->id }}"><i
                                                        class="fa fa-close"></i></button>
                                            </div>
                                        @endforeach
                                    </div>


                                </div>



                             </div>
                             <!-- /Wishlist -->

                             <!-- Cart -->

                             <div class="dropdown">

                                 <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">

                                     <i class="fa fa-shopping-cart"></i>
                                     <span>Your Cart</span>
                                     <div class="qty">{{ $countProduct }}</div>
                                 </a>
                                 <div class="cart-dropdown">
                                    <form action="{{ url('checkout') }}" method="POST">
                                        @csrf
                                     <div class="cart-list">

                                         @foreach ($products as $product)
                                            {{-- set hidden values --}}


                                                <input type="hidden" name="thumbnail[]" value="{{ asset('product_thumbnail/' . $product->getProducts->thumbnail) }}">
                                                <input type="hidden" name="product_name[]" value="{{ $product->getProducts->name }}">
                                                <input type="hidden" name="product_price[]" value="{{ $product->getProducts->price }}">
                                                <input type="hidden" name="subtotal" value="{{ $productPriceCount }}">

                                            {{-- set hidden values --}}
                                             <div class="product-widget">
                                                 <div class="product-img">
                                                     <img src="{{ asset('product_thumbnail/' . $product->getProducts->thumbnail) }}"
                                                         alt="">
                                                 </div>
                                                 <div class="product-body">
                                                     <h3 class="product-name"><a
                                                             href="#">{{ $product->getProducts->name }}</a>
                                                     </h3>
                                                     <h4 class="product-price"><span
                                                             class="qty">1x</span>${{ $product->getProducts->price }}
                                                     </h4>
                                                 </div>
                                                 <button class="delete deleteCartItem" data-id="{{ $product->id }}"><i
                                                         class="fa fa-close"></i></button>
                                             </div>
                                         @endforeach
                                     </div>
                                     <div class="cart-summary">
                                         <small>{{ $countProduct }} Item(s)</small>
                                         <h5>SUBTOTAL: ${{ $productPriceCount }}</h5>
                                     </div>
                                     <div class="cart-btns">
                                         {{-- <a href="#">View Cart</a> --}}
                                         <button type="submit">Checkout <i class="fa fa-arrow-circle-right"></i></button>
                                     </div>
                                    </form>
                                 </div>
                             </div>
                             <!-- /Cart -->
                         @endauth


                         <!-- Menu Toogle -->
                         <div class="menu-toggle">
                             <a href="#">
                                 <i class="fa fa-bars"></i>
                                 <span>Menu</span>
                             </a>
                         </div>
                         <!-- /Menu Toogle -->
                     </div>
                 </div>
                 <!-- /ACCOUNT -->
             </div>
             <!-- row -->
         </div>
         <!-- container -->
     </div>
     <!-- /MAIN HEADER -->
 </header>
 <!-- /HEADER -->
