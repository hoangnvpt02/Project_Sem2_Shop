<header>
	<!-- TOP HEADER -->
	<div id="top-header">
		<div class="container">
			<ul class="header-links pull-left" style="color:#fff">
				<li><i class="fa fa-phone"></i> +84373532666</a></li>
				<li><i class="fa fa-envelope-o"></i> shoptechhn@gmail.com</a></li>
				<li><i class="fa fa-map-marker"></i> 08 Ton That Thuyet,HaNoi</a></li>
			</ul>
			<ul class="header-links pull-right">
				<!-- <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li> -->
				{{-- {{ dump(Auth::check()) }} --}}
				@if( !(Auth::check()) )
					<li><a href="{{ route('user.login') }}"><i class="fa fa-user-o"></i> Log In</a></li>
				@else
						<a href="#" class="d-block" style="color: red">{{ Auth::user()->name }}&nbsp;
							<li><a href="{{ route('user.logout') }}" onclick="event.preventDefault();
								document.getElementById('form-logout').submit();">Log Out</a></li>
						</a>
						<form id="form-logout" action="{{ route('user.logout') }}" method="POST" class="d-none">
								@csrf
						</form>
				@endif
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
						<a href="#" class="logo">
							<img style="width:200px" src="/img/shop_tech.png" alt="">
						</a>
					</div>
				</div>
				<!-- /LOGO -->

				<!-- SEARCH BAR -->
				<div class="col-md-6">
					<div class="header-search">
							<div style="position:relative">
								<input class="form-control" id="search-product" placeholder="Search product here...">
								<div class="showhint" style="position: absolute; top:35px; border-radius:4px;z-index: 11;"></div>
						</div>
					</div>
				</div>
				<!-- /SEARCH BAR -->

				<!-- ACCOUNT -->
				<div class="col-md-3 clearfix">
					<div class="header-ctn">

						<div class="dropdown">
							<a class="dropdown-toggle" style="cursor: pointer;" data-toggle="dropdown" aria-expanded="true">
								{{-- <i class="fa fa-shopping-cart"></i> --}}
								<img src="https://icon-library.com/images/view-details-icon/view-details-icon-7.jpg" style="width:16.72px;height:18px" alt="">
								<span style="display: block;">Order Details</span>
								{{-- <div class="qty">0</div> --}}
							</a>
							{{-- <div class="cart-dropdown">
								<div class="cart-list">
									<!-- <div class="product-widget">
										<div class="product-img">
											<img src="./img/product01.png" alt="">
										</div>
										<div class="product-body">
											<h3 class="product-name"><a href="#">product name goes here</a></h3>
											<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
										</div>
										<button class="delete"><i class="fa fa-close"></i></button>
									</div> -->

									<div class="product-widget">
										<h4 class="text-center">
											<span class="text-muted">Empty</span>
										</h4>
									</div>
								</div>
								<div class="cart-summary">
									<small>0 Item(s) selected</small>
									<h5>SUBTOTAL: 0 VNĐ</h5>
								</div>
								<div class="cart-btns">
									<a href="#">View Cart</a>
									<a href="{{ route('checkout') }}">Checkout <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div> --}}
						</div>


						<!-- Cart -->
						<div class="dropdown">
							<a class="dropdown-toggle" style="cursor: pointer;" data-toggle="dropdown" aria-expanded="true">
								<i class="fa fa-shopping-cart"></i>
								<span>Your Cart</span>
								<div class="qty">0</div>
							</a>
							<div class="cart-dropdown">
								<div class="cart-list">
									<!-- <div class="product-widget">
										<div class="product-img">
											<img src="./img/product01.png" alt="">
										</div>
										<div class="product-body">
											<h3 class="product-name"><a href="#">product name goes here</a></h3>
											<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
										</div>
										<button class="delete"><i class="fa fa-close"></i></button>
									</div> -->

									<div class="product-widget">
										<h4 class="text-center">
											<span class="text-muted">Empty</span>
										</h4>
									</div>
								</div>
								<div class="cart-summary">
									<small>0 Item(s) selected</small>
									<h5>SUBTOTAL: 0 VNĐ</h5>
								</div>
								<div class="cart-btns">
									<a href="#">View Cart</a>
									<a href="{{ route('checkout') }}">Checkout <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</div>
						<!-- /Cart -->

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
<style>
.showhint {
  background-color: #fff;
  height:400px;
	overflow: auto;
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	/* z-index: 1; */
	/* padding: 10px; */
	/* display:none */
}
.media-thumb {
	display: flex;
	align-items: center;
	cursor: pointer!important;
	margin-top:3px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
	$('#search-product').on('keyup',function(){
		var text = $(this).val();
		var html= '';
		$('.showhint').css("display", "none");
		$.ajax({
			type: 'GET',
			url: '/search-product/'+text,
			success: function(res){
				// console.log(res);
				if (res.length > 0){
					for (var data of res) {
				// console.log(data.id);
					let price = number_format(data.price);
					$('.showhint').html(`
						<a class="media-thumb" href="/product_detail/${data.id}">
						<img src="https://hanoicomputercdn.com/media/product/250_63806_laptop_acer_gaming_aspire_7_a715_75g_18.jpeg" alt="logo" style="width:70px">
						<p style="width: 60%">${data.name}</p>
						<p style="width: 30%; font-style:italic;color:red">Price:&nbsp;${price}&nbsp;VND</p>
						</a>
						<hr>
					`)
					}
				}
				else {
					$('.showhint').html(`<p style="padding:10px">No products found matching your search</p>`);
				}
				$('.showhint').css("display", "block");
				$('.showhint').css("width", "100%");
			},
		})
	})


	function number_format (number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}
</script>