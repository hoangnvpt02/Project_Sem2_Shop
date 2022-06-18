@extends('main')
@section('head')

@endsection
@section('content')
    <!-- BREADCRUMB -->
    {{-- @include('breadcrumb') --}}
    <!-- /BREADCRUMB -->
    <div class="container">
        @foreach($orders as $order)
        <div class="panel panel-default" style="margin-top: 25px; margin-bottom: 0;">
            <div class="panel-body">
                <!-- Title -->
                <div class="d-flex justify-content-between align-items-center py-3">
                    <h2 class="h5 mb-0"><a href="/order-detail/{{$order->id}}">Order #{{ $order->id }}</a></h2>
                </div>
                <!-- Main content -->
                <div class="row">
                    <div class="col-lg-12">
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
                                            <td style="width: 60vw;">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <!-- NEWSLETTER -->
    @include('newsletter')
    <!-- /NEWSLETTER -->
@endsection
