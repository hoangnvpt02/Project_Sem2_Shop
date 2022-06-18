@extends('main')
@section('js')
<script>
function search_cat(slug) {
    // alert(slug);
    $.ajax({
        url: '/category_test/' + slug,
        type: 'GET',
        data: $(this).serialize(),
    }).done(function(reponse) {
        console.log(reponse);

        $("#kqdh").html(reponse);

    })
}

function search_price() {
    price_min = $('#price-min').val();
    price_max = $('#price-max').val();
    $.ajax({
        url: '/category/' + price_min + '/' + price_max,
        type: 'GET',
        data: $(this).serialize(),
    }).done(function(reponse) {

        $("#kqdh").html(reponse);

    })
}
</script>
@endsection
@section('content')
@include('breadcrumb')
<div class="section">
    <div class="container">
        <div class="row">
            <div id="aside" class="col-md-3">
                <div class="aside">
                    <h3 class="aside-title">Categories</h3>
                    <div class="checkbox-filter">
                        @foreach($categories as $category)
                        <div class="input-checkbox">
                            <input type="checkbox" id="category-{{ $category->id }}">
                            <label for="category-{{ $category->id }}">
                                <span></span>
                                <a href="javascript:" onclick="search_cat('{{ $category->slug }}')">
                                    {{ $category->name }}</a>
                                <small>{{ $category->products->count() }}</small>
                            </label>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="aside">
                    <h3 class="aside-title">Price</h3>
                    <div class="price-filter">
                        <div id="price-slider"></div>
                        <div class="input-number price-min">
                            <input id="price-min" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <span>-</span>
                        <div class="input-number price-max">
                            <input id="price-max" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                    <div class="btn btn-success" onclick="search_price()">Tìm kiếm</div>
                </div>
                <div class="aside">
                    <h3 class="aside-title">Top selling</h3>
                    <div class="product-widget">
                        <div class="product-img">
                            <img src="/img/product01.png" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                        </div>
                    </div>

                    <div class="product-widget">
                        <div class="product-img">
                            <img src="/img/product02.png" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                        </div>
                    </div>
                    <div class="product-widget">
                        <div class="product-img">
                            <img src="/img/product03.png" alt="">
                        </div>
                        <div class="product-body">
                            <p class="product-category">Category</p>
                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div id="store" class="col-md-9">
                <div class="row" id="kqdh">
                    @foreach($products as $product)
                    <div class="col-md-4" style="height:600px">
                        <div class="product" data-prd-id="{{ $product->id }}">
                            <div class="product-img">
                                <img src="/img/product01.png" alt="">
                                <div class="product-label">
                                    <span class="sale">-30%</span>
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
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#"><span
                                            height="300px">{{ $product->name }}</span></a></h3>
                                <h4 class="product-price">{{ $product->price }} <del
                                        class="product-old-price">$990.00</del></h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                            class="tooltipp">add to wishlist</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                            class="tooltipp">add to compare</span></button>
                                    <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                            view</span></button>
                                </div>
                            </div>
                            <div class="add-to-cart">
                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-12">
                        {!! $products->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('newsletter')
    @endsection