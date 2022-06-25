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
<div class="section">
    <div class="container">
        <div class="row">
            <div id="aside" class="col-md-3">
                <div class="aside">
                    <h3 class="aside-title">Categories</h3>
                    <div class="checkbox-filter">
                        @foreach($categories as $category)
                        <div class="input-checkbox">
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
            </div>
            <div id="store" class="col-md-9">
                <div class="row" id="kqdh">
                    @foreach($products as $product)
                    <div class="col-md-4" style="height:600px">
                        <div class="product" data-prd-id="{{ $product->id }}">
                            <div class="product-img">
                                <img src="/storage/{{ $product->thumb }}" alt="">
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
                                <p class="product-category">{{ $product->category->name }}</p>
                                <h3 class="product-name"><a href="/product_detail/{{ $product->id }}"><span
                                            height="300px">{{ $product->name }}</span></a></h3>
                                <h4 class="product-price">{{ number_format($product->price) }} VND</h4>
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