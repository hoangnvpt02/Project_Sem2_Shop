@extends('main')
@section('content')
    <!-- BREADCRUMB -->
    {{-- @include('breadcrumb') --}}
    <!-- /BREADCRUMB -->
    <div class="container-fluid">
        <div class="container" style="margin-top: 10px;">
            <!-- Title -->
            @foreach($orders as $order)
            @if(session('success'))
                <div class="alert alert-success col-md-3">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('danger'))
                <div class="alert alert-danger col-md-3">
                    {{ session('danger') }}
                </div>
            @endif
            <div class="d-flex justify-content-between align-items-center py-3">
                <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order #{{ $order->id }}</h2>
            </div>

            <!-- Main content -->
            <div class="row">
                <div class="col-lg-8">
                    <!-- Details -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="mb-3 d-flex justify-content-between" style="margin-bottom: 10px;">
                                <div>
                                    <span class="me-3">22-11-2021</span>
                                    <span class="me-3">#{{ $order->id }}</span>
                                    @if ($order->status == 1)
                                        <span class="badge rounded-pill">Đang chờ xác nhận</span>
                                    @elseif ($order->status == 2)
                                        <span class="badge rounded-pill" style="background-color: green">Đơn hàng đã xác nhận</span>
                                    @elseif ($order->status == 3)
                                        <span class="badge rounded-pill" style="background-color: blue">Đang vận chuyển</span>
                                    @elseif ($order->status == 4)
                                        <span class="badge rounded-pill" style="background-color: green">Đã nhận hàng thành công</span>
                                    @else
                                        <span class="badge rounded-pill" style="background-color: red">Đã hủy</span>
                                    @endif
                                </div>
                            </div>
                            
                            <table class="table table-borderless">
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($order->order_details as $order_details)
                                    @php
                                        $total += $order_details->price * $order_details->quantity;
                                    @endphp
                                    <tr>
                                        <td style="width: 38vw;">
                                            <div style="display: flex;">
                                                <div>
                                                    <img src="https://via.placeholder.com/280x280/87CEFA/000000" alt=""
                                                        width="100" class="img-fluid">
                                                </div>
                                                <div style="margin-left: 20px">
                                                    <h6>
                                                        <a href="#" style="font-size: 17px;">{{ $order_details->products->name }}</a>
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $order_details->quantity }}</td>
                                        <td class="text-end">{{ number_format($order_details->price, 0, ',', ' ') }} đ</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="fw-bold">
                                        <td colspan="2">TOTAL</td>
                                        <td class="text-end">{{ number_format($total, 0, ',', ' ') }} đ</td>
                                    </tr>
                                </tfoot>
                            </table>
                            @if ($order->status == 1)  
                                <form action="/order-cancel/{{$order->id}}" method="post" enctype="multipart/form">
                                    <button type="submit" class="btn btn-danger">Hủy đơn hàng</button>
                                    @csrf
                                </form>
                            @endif
                            @if ($order->status == 3)
                                    <button onclick="received({{ $order->id }}, '/order-received')" type="button" class="btn btn-primary">Đã nhận được hàng</button>
                            @endif
                        </div>
                    </div>
                    {{-- <!-- Payment -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3 class="h6">Payment Method</h3>
                                    <p>Visa -1234 <br>
                                        Total: {{ number_format($total, 0, ',', ' ') }} đ <span class="badge bg-success rounded-pill">PAID</span></p>
                                </div>
                                <div class="col-lg-6">
                                    <h3 class="h6">Billing address</h3>
                                    <address>
                                        <strong>John Doe</strong><br>
                                        1355 Market St, Suite 900<br>
                                        San Francisco, CA 94103<br>
                                        <abbr title="Phone">P:</abbr> (123) 456-7890
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div class="col-lg-4">
                    <!-- Customer Notes -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="h6">Customer Notes</h3>
                            <p>Sed enim, faucibus litora velit vestibulum habitasse. Cras lobortis cum sem aliquet mauris
                                rutrum. Sollicitudin. Morbi, sem tellus vestibulum porttitor.</p>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <!-- Shipping information -->
                        <div class="card-body">
                            <h3 class="h6">Shipping Information</h3>
                            <strong>FedEx</strong>
                            <span><a href="#" class="text-decoration-underline" target="_blank">FF1234567890</a> <i
                                    class="bi bi-box-arrow-up-right"></i> </span>
                            <hr>
                            <h3 class="h6">Address</h3>
                            <address>
                                <strong>John Doe</strong><br>
                                1355 Market St, Suite 900<br>
                                San Francisco, CA 94103<br>
                                <abbr title="Phone">P:</abbr> (123) 456-7890
                            </address>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- NEWSLETTER -->
    @include('newsletter')
    <!-- /NEWSLETTER -->
@endsection
@section('js')
    <script src="/js/order.js"></script>
@endsection
