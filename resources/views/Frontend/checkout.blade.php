@include('Frontend.layout.head')

	<body>
		@include('Frontend.layout.header')
        @include('Frontend.layout.nav')
		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>

					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
                    <form method="POST" action="{{ route('checkout') }}">
                        @csrf
                        @foreach ($products as $pro )
                            <input type="hidden" name="product_id[]" value="{{ $pro->product_id }}">
                            <input type="hidden" name="cart_id[]" value="{{ $pro->id }}">

                        @endforeach
                        <input type="hidden" name="amount" value="{{ $subTotal }}">
					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="first_name" placeholder="First Name">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="last_name" placeholder="Last Name">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Address">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" placeholder="City">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="country" placeholder="Country">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="zip_code" placeholder="ZIP Code">
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="tel" placeholder="Telephone">
							</div>

						</div>
						<!-- /Billing Details -->


						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
                            @foreach($products as $product)
							<div class="order-products">
                                <div class="order-col">
                                    <div>
                                        {{$product->getProducts->name}}
                                    </div>
									<div>{{$product->getProducts->price}}</div>
								</div>
							</div>
                            @endforeach
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">{{ $subTotal }}</strong></div>
							</div>
						</div>

                        <label for="">
                            Cash on Delivery
                        </label>
<button type="submit" class="primary-btn order-submit" >Place order</button>
					</div>
					<!-- /Order Details -->
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
			
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

        <script>
            let userAmount = document.getElementById('userAmount');
            let userPaidAmount = document.getElementById('userPaidAmount');
            let subTotal = document.getElementById('subTotal');
            userAmount.onkeyup = function(e){
                userPaidAmount.value = e.target.value;
                if(subTotal.value == userPaidAmount.value){
                    placeOrderBtn.onclick = function(){
                        alert('goto checkout ')
                    }
                }
                else{
                    placeOrderBtn.onclick = function(){
                        return false;
                    }
                }
            }

        </script>
	    @include('Frontend.layout.footer')
	</body>
</html>
