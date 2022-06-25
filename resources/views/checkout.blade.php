@extends('main')
@section('content')

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <form action="#" id="billingDetails">
                <div class="row">
                    <div class="col-md-7">
                        <!-- Billing Details -->
                        @if (Auth::check())
                        <div class="billing-details">
                            <div class="section-title">
                                <h3 class="title">Billing address</h3>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="input" type="text" name="name" placeholder="Name" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="input" type="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="input" type="text" name="phone" placeholder="Phone" value="{{ Auth::user()->phone }}">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="input" type="text" name="address" placeholder="Address" value="{{ Auth::user()->address }}">
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
                                    Ship to a diffrent address ?
                                </label>
                                <div class="caption">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input class="input" type="text" name="address_two" placeholder="Address">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Shiping Details -->
                        @endif

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