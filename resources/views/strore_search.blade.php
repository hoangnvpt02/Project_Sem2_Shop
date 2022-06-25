
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-md-4"  style="height:600px">
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
                                <h3 class="product-name"><a href="#">{{ $product->name }}</a></h3>
                                <h4 class="product-price">${{ $product->price }} <del class="product-old-price">$990.00</del></h4>
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
                   
                </div>
                @if($xd == 0)
                <div><a href="{{ route('web.category.search',['slug'=>$category->slug])}}">Xem thêm ...</a></div>
                @else
                <div><a href="{{ route('web.category',['price_min'=>$price_min,'price_max'=>$price_max])}}">Xem thêm ...</a></div>
                @endif