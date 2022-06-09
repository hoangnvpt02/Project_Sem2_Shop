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
				<li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
				<li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
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
							<img src="./img/logo.png" alt="">
						</a>
					</div>
				</div>
				<!-- /LOGO -->

				<!-- SEARCH BAR -->
				<div class="col-md-6">
					<div class="header-search">
							<div style="position:relative">
								<input class="form-control" id="search" placeholder="Nhập sản phầm cần tìm kiếm...">
								<div class="showhint" style="position: absolute; top:35px; border-radius:4px;z-index: 11;"></div>
						</div>
					</div>
				</div>
				<!-- /SEARCH BAR -->

				<!-- ACCOUNT -->
				<div class="col-md-3 clearfix">
					<div class="header-ctn">
						<!-- Wishlist -->
						<div>
							<a href="#">
								<i class="fa fa-heart-o"></i>
								<span>Your Wishlist</span>
								<div class="qty">2</div>
							</a>
						</div>
						<!-- /Wishlist -->

						<!-- Cart -->
						<div class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<i class="fa fa-shopping-cart"></i>
								<span>Your Cart</span>
								<div class="qty">3</div>
							</a>
							<div class="cart-dropdown">
								<div class="cart-list">
									<div class="product-widget">
										<div class="product-img">
											<img src="./img/product01.png" alt="">
										</div>
										<div class="product-body">
											<h3 class="product-name"><a href="#">product name goes here</a></h3>
											<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
										</div>
										<button class="delete"><i class="fa fa-close"></i></button>
									</div>

									<div class="product-widget">
										<div class="product-img">
											<img src="./img/product02.png" alt="">
										</div>
										<div class="product-body">
											<h3 class="product-name"><a href="#">product name goes here</a></h3>
											<h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
										</div>
										<button class="delete"><i class="fa fa-close"></i></button>
									</div>
								</div>
								<div class="cart-summary">
									<small>3 Item(s) selected</small>
									<h5>SUBTOTAL: $2940.00</h5>
								</div>
								<div class="cart-btns">
									<a href="#">View Cart</a>
									<a href="#">Checkout <i class="fa fa-arrow-circle-right"></i></a>
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
	
  /* color:red; */
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
	$('#search').on('keyup',function(){
		var text = $(this).val();
		$.ajax({
			type: 'GET',
			url: '/search-product/'+text,
			success: function(res){
				if (res.length > 0){
					$('.showhint').css("width", "100%");
					var html= '';
					for (var data of res) {
						html+= '<a class="media-thumb" href="#">';	
						html+= '<img src="https://hanoicomputercdn.com/media/product/250_63806_laptop_acer_gaming_aspire_7_a715_75g_18.jpeg" alt="logo" style="width:70px">'
						html+= '<p style="width: 65%">'+data.name+'</p>'
						html+= '<p style="width: 20%" class="text-primary">'+data.price+'&nbsp;VND</p>'
						html+= '</a>'
						html+= '<hr>'
					}
				}
				else {
					var html= '<p style="padding:10px">Không tìm thấy sản phẩm phù hợp với tìm kiếm</p>';
				}
				$('.showhint').html(html);
			},
		})

	})
	
</script>