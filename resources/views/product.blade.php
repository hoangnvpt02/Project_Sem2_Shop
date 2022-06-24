@extends('main')
@section('content')
    <!-- BREADCRUMB -->
    @include('breadcrumb')
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Product main img -->
                <div class="col-md-5 col-md-push-2">
                    <div id="product-main-img">
                        @foreach($products->products_images as $images)
                        <div class="product-preview">
                            <img src="{{ $images->image }}" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- /Product main img -->

                <!-- Product thumb imgs -->
                <div class="col-md-2  col-md-pull-5">
                    <div id="product-imgs">
                        @if (!empty($products->products_images))
                            @foreach ($products->products_images as $images)
                                <div class="product-preview">
                                    <img src="{{ $images->image }}" alt="">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <!-- /Product thumb imgs -->

                <!-- Product details -->
                <div class="col-md-5">
                    <div class="product-details">
                        <h2 class="product-name">{{ $products->name }}</h2>
                        <div>
                            <div class="product-rating">
                                @foreach($products->avg_rating_comment as $rating)
                                    @for ($i = 0; $i < $rating->average_star; $i++) 
                                        <i class="fa fa-star"></i>
                                    @endfor

                                    {{ ($rating->average_star) }}
                                @endforeach
                            </div>
                            <a class="review-link" href="#">{{ $products->comment_products->count() }} Review(s) | Add your review</a>
                        </div>
                        <div>
                            <h3 class="product-price">{{ number_format($products->price) }} <del class="product-old-price">{{ number_format($products->price) }}</del></h3>
                            <span class="product-available">In Stock</span>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                        <div class="product-options add-to-cart">
                            <div class="qty-label">
                                Qty
                                <div class="input-number">
                                    <input type="number" value="1">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                            <label>
                                Color
                                <select class="input-select">
                                    @foreach($products->products_color as $color)
                                        <option value="0">{{ $color->color }}</option>
                                    @endforeach
                                </select>
                            </label>
                        </div>

                        <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div>

                        <ul class="product-btns">
                            <li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
                            <li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
                        </ul>

                        <ul class="product-links">
                            <li>Category:</li>
                            <li><a href="#">Headphones</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>

                        <ul class="product-links">
                            <li>Share:</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>

                    </div>
                </div>
                <!-- /Product details -->

                <!-- Product tab -->
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Reviews ({{ $products->comment_products->count() }})</a></li>
                            <li><a data-toggle="tab" href="#tab2">Description</a></li>
                        </ul>
                        <!-- /product tab nav -->

                        <!-- product tab content -->
                        <div class="tab-content">
                            <!-- tab1  -->
                            <div id="tab1" class="tab-pane fade in active">
                                <div class="row" >
                                    <!-- Reviews -->
                                    <div class="col-md-6" style="margin-left: 12em">
                                        <div id="reviews">
                                            <ul class="reviews">
                                                @foreach ($products_comments as $comment)
                                                    <li>
                                                        <div class="review-heading">
                                                            @if (empty($comment->fullname))
                                                                <h5 class="name">{{ $comment->name }}</h5>
                                                            @else 
                                                                <h5 class="name">{{ $comment->fullname }}</h5>
                                                            @endif
                                                            <p class="date">{{ $comment->created_at }}</p>
                                                            <div class="review-rating">
                                                                @for ($i = 0; $i < $comment->star; $i++) 
                                                                    <i class="fa fa-star"></i>
                                                                @endfor

                                                                {{ ($comment->star) }}
                                                            </div>
                                                        </div>
                                                        <div class="review-body">
                                                            <p>{{ $comment->content }}</p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="reviews-pagination">
                                                {{ $products_comments->links() }}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Reviews -->

                                    <!-- Review Form -->
                                    <div class="col-md-3">
                                        <div id="review-form">
                                            <form class="review-form" id="comment_product" enctype="multipart/form-data">
                                                <input type="hidden" name="product_id" value="{{ $products->id }}">
                                                @if (!Auth::check())
                                                    <input class="input" type="text" name="name" placeholder="Your Name" require>
                                                    <input class="input" type="email" name="email" placeholder="Your Email" require>
                                                    <textarea class="input" style="min-height: 6.5em" name="content" placeholder="Your Review" require></textarea>
                                                @else
                                                    <textarea class="input content-comment_product" name="content" placeholder="Your Review" require></textarea>
                                                @endif
                                                <div class="input-rating">
                                                    <span>Your Rating: </span>
                                                    <div class="stars">
                                                        <input id="star5" name="star" value="5" type="radio"><label for="star5"></label>
                                                        <input id="star4" name="star" value="4" type="radio"><label for="star4"></label>
                                                        <input id="star3" name="star" value="3" type="radio"><label for="star3"></label>
                                                        <input id="star2" name="star" value="2" type="radio"><label for="star2"></label>
                                                        <input id="star1" name="star" value="1" type="radio"><label for="star1"></label>
                                                    </div>
                                                </div>
                                                <button class="primary-btn">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /Review Form -->
                                </div>
                            </div>
                            <!-- /tab1  -->

                            <!-- tab2  -->
                            <div id="tab2" class="tab-pane fade in">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>{{ $products->description }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab2  -->
                        </div>
                        <!-- /product tab content  -->
                    </div>
                </div>
                <!-- /product tab -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- Section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Related Products</h3>
                    </div>
                </div>

                <!-- product -->
                @foreach ($products_relateds as $relateds)
                    <div class="col-md-3 col-xs-6">
                        <div class="product">
                            <div class="product-img">
                                @if (count($relateds->products_images) > 0) 
                                <img src="{{ $relateds->products_images[0]->image }}" alt="">
                                @endif
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="/product_detail/{{ $relateds->id }}">{{ $relateds->name }}</a></h3>
                                <h4 class="product-price">{{ number_format($relateds->price) }} <del class="product-old-price">{{ number_format($relateds->price) }}</del></h4>
                                <div class="product-rating">
                                </div>
                                <div class="product-btns">
                                    <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                                    <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                                    <button class="quick-view">
                                        <a href="/product_detail/{{ $relateds->id }}">
                                            <i class="fa fa-eye"></i><span class="tooltipp">quick view</span>
                                        </a>
                                    </button>
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
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /Section -->

    <!-- NEWSLETTER -->
    @include('newsletter')
    <!-- /NEWSLETTER -->
@endsection