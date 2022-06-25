<footer style="margin-top: 60px;" id="footer">
	<!-- top footer -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-4 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">About Us</h3>
						{{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p> --}}
						<ul class="footer-links" style="color:#fff">
							<li><i class="fa fa-map-marker"></i>08 Ton That Thuyet,HaNoi</a></li>
							<li><i class="fa fa-phone"></i>+84373532666</a></li>
							<li><i class="fa fa-envelope-o"></i>shoptechhn@gmail.com</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-4 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Categories</h3>
						<ul class="footer-links">
							@foreach ($categories as $category)
							<li><a href="/category/{{ $category->slug }}">{{ $category->name }}</a></li>
							@endforeach
						</ul>
					</div>
				</div>

				<div class="clearfix visible-xs"></div>

				<div class="col-md-4 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Information</h3>
						<ul class="footer-links">
							<li><a href="#">About Us</a></li>
							{{-- <li><a href="#">Contact Us</a></li> --}}
						</ul>
					</div>
				</div>
{{-- 
				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Service</h3>
						<ul class="footer-links">
							<li><a href="#">My Account</a></li>
							<li><a href="#">View Cart</a></li>
							<li><a href="#">Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>
							<li><a href="#">Help</a></li>
						</ul>
					</div>
				</div> --}}
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /top footer -->

	<!-- bottom footer -->
	{{-- <div id="bottom-footer" class="section">
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-12 text-center">
					<ul class="footer-payments">
						<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
						<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
					</ul>
					<span class="copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</span>
				</div>
			</div>
				<!-- /row -->
		</div>
		<!-- /container -->
	</div> --}}
	<!-- /bottom footer -->
</footer>

<!-- jQuery Plugins -->
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/slick.min.js"></script>
<script src="/js/nouislider.min.js"></script>
<script src="/js/jquery.zoom.min.js"></script>
<script src="/js/main.js"></script>
<script src="/js/product.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/js/main.js"></script>
<script>
	// $(document).ready(function() {
		loadCart()
		
		function loadCart() {
			var data_cart = JSON.parse(localStorage.getItem("data_cart"));

			if (!data_cart) return
			
			var product_widgets = ""
			var cart_summary = ""
			var cart_qty = 0
			var cart_subtotal = 0
			for (var prd_id in data_cart) {
				product_widgets += `
					<div class="product-widget" data-prd-id="${data_cart[prd_id].id}">
						<div class="product-img">
							<img src="/storage/${data_cart[prd_id].image}" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-name"><a href="/product_detail/${data_cart[prd_id].id}">${data_cart[prd_id].name.substring(0, 30)}</a></h3>
							<h4 class="product-price"><span class="qty">${data_cart[prd_id].qty}x</span>${formatStringToCurrency(data_cart[prd_id].qty * data_cart[prd_id].price, " VNĐ")}</h4>
						</div>
						<button class="delete" onclick="removeCart(this)"><i class="fa fa-close"></i></button>
					</div>
				`

				cart_qty += data_cart[prd_id].qty
				cart_subtotal += data_cart[prd_id].qty * data_cart[prd_id].price
			}

			if(!Object.keys(data_cart).length) {
				product_widgets = `
					<div class="product-widget">
						<h4 class="text-center">
							<span class="text-muted">Empty</span>
						</h4>
					</div>
				`
			}

			cart_summary = `
				<small>${cart_qty} Item(s) selected</small>
				<h5>SUBTOTAL: ${formatStringToCurrency(cart_subtotal, " VNĐ")}</h5>
			`

			$(".header-ctn .dropdown .qty").html(cart_qty)
			$(".header-ctn .dropdown .cart-list").html(product_widgets)
			$(".header-ctn .dropdown .cart-summary").html(cart_summary)
		}

		function removeCart(obj) {
			var prd_id = $(obj).closest(".product-widget").data("prd-id")

			var data_cart = JSON.parse(localStorage.getItem("data_cart"));

			if (data_cart[`prd_${prd_id}`]) {
				data_cart[`prd_${prd_id}`].qty = data_cart[`prd_${prd_id}`].qty - 1

				if (data_cart[`prd_${prd_id}`].qty == 0) {
					delete data_cart[`prd_${prd_id}`]
				}
			}

			localStorage.setItem('data_cart', JSON.stringify(data_cart))

			loadCart()
		}
		
		$(".add-to-cart-btn").click(function(e) {
			e.preventDefault()

			var prd_id = $(this).closest(".product").data("prd-id")

			if(!prd_id) {
				prd_id = $(this).closest(".product-details").data("prd-id")
			}

			$.ajax({
				type: "POST",
				url: "{{ route('addToCart') }}",
				data: {
					prd_id: parseInt(prd_id),
					_token: "{{ csrf_token() }}"
				},
				success: function(response) {

					var data_cart = localStorage.getItem("data_cart");

					if (data_cart === "" || data_cart === null) {
						data_cart = {}
					} else {
						data_cart = JSON.parse(data_cart)
					}

					var qty = 1

					if($("input[type='number']").length ) {
						qty = parseInt($("input[type='number']").val());
					} 	
					
					if (data_cart[`prd_${response.id}`]) {
						// filterd_data_cart[`prd_${response.id}`].id = response.id
						data_cart[`prd_${response.id}`].qty = data_cart[`prd_${response.id}`].qty + qty
						// data_cart[`prd_${response.id}`].name = response.name
						// data_cart[`prd_${response.id}`].price = data_cart[`prd_${response.id}`].price + response.price
					} else {
						data_cart[`prd_${response.id}`] = {}
						data_cart[`prd_${response.id}`].id = response.id
						data_cart[`prd_${response.id}`].qty = 1
						data_cart[`prd_${response.id}`].name = response.name
						data_cart[`prd_${response.id}`].price = response.price
						data_cart[`prd_${response.id}`].image = response.thumb
					}

					localStorage.setItem('data_cart', JSON.stringify(data_cart))
					
					loadCart()
					
					$(".header-ctn .dropdown").addClass("open")

					localStorage.setItem('data_cart', JSON.stringify(data_cart))

				}
			});
		})
	// })
	
	function formatStringToCurrency(n, currency) {
		return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + currency;
	}
</script>
@yield('footer')
