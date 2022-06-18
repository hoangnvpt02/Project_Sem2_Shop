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
            <form action="#" id="billingDetails">
                <div class="row">
                    <div class="col-md-7">
                        <!-- Billing Details -->
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Billing address</h3>
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="first-name" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <input class="input" type="text" name="last-name" placeholder="Last Name">
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
                                <input class="input" type="text" name="zip-code" placeholder="ZIP Code">
                            </div>
                            <div class="form-group">
                                <input class="input" type="tel" name="tel" placeholder="Telephone">
                            </div>
                            <div class="form-group">
                                <div class="input-checkbox">
                                    <input type="checkbox" name="create_account" id="create-account">
                                    <label for="create-account">
                                        <span></span>
                                        Create Account?
                                    </label>
                                    <div class="caption">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                                        <input class="input" type="password" name="password" placeholder="Enter Your Password">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Billing Details -->

                        <!-- Shiping Details -->
                        <div class="shiping-details">
                            <div class="section-title">
                                <h3 class="title">Shiping address</h3>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" name="shipping_address" id="shiping-address">
                                <label for="shiping-address">
                                    <span></span>
                                    Ship to a diffrent address?
                                </label>
                                <div class="caption">
                                    <div class="form-group">
                                        <input class="input" type="text" name="first_name" placeholder="First Name">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="last_name" placeholder="Last Name">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="email" name="_email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="_address" placeholder="Address">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="_city" placeholder="City">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="_country" placeholder="Country">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="text" name="_zip_code" placeholder="ZIP Code">
                                    </div>
                                    <div class="form-group">
                                        <input class="input" type="tel" name="_tel" placeholder="Telephone">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Shiping Details -->

                        <!-- Order notes -->
                        <div class="order-notes">
                            <textarea name="order_note" class="input" placeholder="Order Notes"></textarea>
                        </div>
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
                            <div class="order-products">
                                <!-- <div class="order-col">
                                    <div>1x Product Name Goes Here</div>
                                    <div>$980.00</div>
                                </div>
                                <div class="order-col">
                                    <div>2x Product Name Goes Here</div>
                                    <div>$980.00</div>
                                </div> -->
                            </div>
                            <div class="order-col">
                                <div>Shiping</div>
                                <div><strong>FREE</strong></div>
                            </div>
                            <div class="order-col">
                                <div><strong>TOTAL</strong></div>
                                <div><strong class="order-total">0 VNĐ</strong></div>
                            </div>
                        </div>
                        <div class="payment-method">
                            <div class="input-radio">
                                <input type="radio" name="payment" value="cod id="cod" checked>
                                <label for="cod">
                                    <span></span>
                                    COD
                                </label>
                                <div class="caption">
                                    <p>Thanh toán khi nhận hàng.</p>
                                </div>
                            </div>
                            <div class="input-radio">
                                <input type="radio" name="payment" id="payment-1" disabled="disabled">
                                <label for="payment-1">
                                    <span></span>
                                    Direct Bank Transfer
                                </label>
                                <div class="caption">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                            <div class="input-radio">
                                <input type="radio" name="payment" id="payment-2" disabled="disabled">
                                <label for="payment-2">
                                    <span></span>
                                    Cheque Payment
                                </label>
                                <div class="caption">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                            <div class="input-radio">
                                <input type="radio" name="payment" id="payment-3" disabled="disabled">
                                <label for="payment-3">
                                    <span></span>
                                    Paypal System
                                </label>
                                <div class="caption">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" name="confirm_terms_conditions" id="terms">
                            <label for="terms">
                                <span></span>
                                I've read and accept the <a href="#">terms & conditions</a>
                            </label>
                        </div>
                        <button class="btn primary-btn order-submit">Place order</button>
                    </div>
                    <!-- /Order Details -->
                </div>
            </form>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
    
    <!-- NEWSLETTER -->
    @include('newsletter')
    <!-- /NEWSLETTER -->
@endsection

@section('script')
<script>
    $("button.order-submit").click(function(e) {
        e.preventDefault();

        data_cart = JSON.parse(localStorage.getItem("data_cart"))

        if (!data_cart) {
            alert("Your cart is empty!")
        }

        var payload = getAllValues($("#billingDetails"))

        payload.data_cart = data_cart;
        
        $.ajax({
            type: "POST",
            url: "{{ route('do.checkout') }}",
            data: {
                checkout_info: payload,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {

                response = JSON.parse(response)

                if (response.alert) {
                    localStorage.removeItem("data_cart")
                    alert(response.message);
                    window.location.replace('{{ route("web.home.index") }}')
                }
            }
        });
    })
    
    function loadCart2 () {
        var data_cart = JSON.parse(localStorage.getItem("data_cart"));

        if (!data_cart) return
        
        var order_products = ""
        var sub_total = 0

        for (var prd_key in data_cart) {
            order_products += `
                <div class="order-col">
                    <div>${data_cart[prd_key].qty}x ${data_cart[prd_key].name}</div>
                    <div>${formatStringToCurrency(data_cart[prd_key].qty * data_cart[prd_key].price," VNĐ")}</div>
                </div>
            `

            sub_total += data_cart[prd_key].qty * data_cart[prd_key].price
        }

        if (!Object.keys(data_cart).length) {
            order_products += `
                <div class="order-col text-center">
                    <h4><span class="text-muted">Empty!</span></h4>
                </div>
            `
        }
        
        $(".order-summary .order-products").html(order_products)
        $(".order-summary .order-total").html(formatStringToCurrency(sub_total, " VNĐ"))
    }

    loadCart2()

    function formatStringToCurrency(n, currency) {
		return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + currency;
	}

    function getAllValues(form) {
        var allVal = {};
        $(form)
            .find(":input")
            .each(function () {
            var type = $(this).prop("type");
            var obj_key = $(this).attr("name");
            var obj_val = $(this).val();

            if (["button", "submit"].includes(type)) return;

            switch (type) {
                case "tel":
                allVal[obj_key] = obj_val.split(".").join("");
                break;
                case "checkbox":
                if (!$(this).is(":checked")) return;
                allVal[`${obj_key}`]
                    ? (allVal[`${obj_key}`] = [...allVal[`${obj_key}`], obj_val])
                    : (allVal[`${obj_key}`] = [obj_val]);
                break;
                case "radio":
                if ($(this).is(":checked")) allVal[obj_key] = obj_val;
                break;
                default:
                allVal[obj_key] = obj_val;
                break;
            }
        });

        return allVal;
    }
</script>
@endsection