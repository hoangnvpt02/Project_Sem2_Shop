@extends('main')

@section('content')
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- shop -->
                @foreach($banners as $banner)
                <div class="col-md-3 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{ $banner->urlImage() }}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>{{ $banner->categories->name }}<br>Collection</h3>
                            <a href="{{ route('web.category.search',['slug'=>$banner->categories->slug]) }}" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- /shop -->
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
                        <h3 class="title">New Products</h3>
                        <div class="section-nav">
                            <ul class="section-tab-nav tab-nav">
                                @foreach($categories as $category)
                                <li><a href="{{ route('web.category.search',['slug'=>$category->slug])}}">{{ $category->name }}</a></li>
                                @endforeach
                                <!-- <li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
                                <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                                <li><a data-toggle="tab" href="#tab1">Accessories</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                                    <!-- product -->
                                    @foreach($products as $product)
                                    <div class="col-md-3">
                                        <div class="product" data-prd-id="{{ $product->id }}">
                                            <div class="product-img">
                                                @if (count($product->products_images) > 0)
                                                    <img src="/storage/{{ $product->thumb }}" alt="">
                                                @endif
                                                <div class="product-label">
                                                    <span class="new">
                                                        <?php
                                                        $today = date("Y-m-d h:m:s");
                                                        if(strtotime($today) - strtotime($product->updated_at) < 864000)
                                                        echo 'NEW';
                                                        else echo'OLD';
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{ $product->category->name}}</p>
                                                <h3 class="product-name"><a href="/product_detail/{{$product->id}}">{{ $product->name }}</a></h3>
                                                <h4 class="product-price">{{ number_format($product->price)}} VND</h4>
                                                <div class="product-rating">
                                                    @foreach($product->avg_rating_comment as $rating)
                                                        @for ($i = 0; $i < $rating->average_star; $i++) 
                                                            <i class="fa fa-star"></i>
                                                        @endfor
    
                                                        {!! show_star_comment_product($rating->average_star) !!}
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /product -->
                                    @endforeach
                                    <!-- product -->

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

    <!-- HOT DEAL SECTION -->
    <div id="hot-deal" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="hot-deal">
                        <ul class="hot-deal-countdown">
                            <li>
                                <div>
                                    <h3>02</h3>
                                    <span>Days</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>10</h3>
                                    <span>Hours</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>34</h3>
                                    <span>Mins</span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <h3>60</h3>
                                    <span>Secs</span>
                                </div>
                            </li>
                        </ul>
                        <h2 class="text-uppercase">hot deal this week</h2>
                        <p>New Collection Up to 50% OFF</p>
                        <a class="primary-btn cta-btn" href="#">Shop now</a>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /HOT DEAL SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Top selling</h3>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- product -->
                            @foreach($products_top as $top)
                            <div class="col-md-3">
                                <div class="product" data-prd-id="{{ $top->id }}">
                                    <div class="product-img">
                                        <img src="/storage/{{ $top->thumb }}" alt="">
                                        <div class="product-label">
                                            <span class="new">NEW</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">{{ $top->category->name }}</p>
                                        <h3 class="product-name"><a href="/product_detail/{{ $top->id }}">{{ $top->name }}</a></h3>
                                        <h4 class="product-price">{{ number_format($top->price)}} VND</h4>
                                        <div class="product-rating">
                                            @foreach($top->avg_rating_comment as $rating)
                                                @for ($i = 0; $i < $rating->average_star; $i++) 
                                                    <i class="fa fa-star"></i>
                                                @endfor
    
                                                {!! show_star_comment_product($rating->average_star) !!}
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- /product -->
                        </div>
                    </div>
                </div>
                <!-- /Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    {{-- <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-3" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-3">
                        <div>
                            <!-- product widget -->
                            @foreach($products_top->take(3) as $top)
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product07.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">{{ $top->name}}</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            @endforeach
                            <!-- /product widget -->
                        </div>

                        <div>
                        @foreach($products_top->take(3) as $top)
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product07.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">{{ $top->name}}</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-4" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-4">
                        <div>
                            <!-- product widget -->
                            @foreach($products_top->take(3) as $top)
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product07.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">{{ $top->name}}</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            @endforeach
                            <!-- product widget -->
                        </div>

                        <div>
                        @foreach($products_top->take(3) as $top)
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product07.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">{{ $top->name}}</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="clearfix visible-sm visible-xs"></div>

                <div class="col-md-4 col-xs-6">
                    <div class="section-title">
                        <h4 class="title">Top selling</h4>
                        <div class="section-nav">
                            <div id="slick-nav-5" class="products-slick-nav"></div>
                        </div>
                    </div>

                    <div class="products-widget-slick" data-nav="#slick-nav-5">
                        <div>
                        @foreach($products_top->take(3) as $top)
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product07.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">{{ $top->name}}</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div>
                        @foreach($products_top->take(3) as $top)
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="./img/product07.png" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">Category</p>
                                    <h3 class="product-name"><a href="#">{{ $top->name}}</a></h3>
                                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div> --}}
    <!-- /SECTION -->

    <!-- NEWSLETTER -->
    @include('newsletter')
    <!-- /NEWSLETTER -->
@endsection