@extends('layouts.admin')

@section('title')
Trang chủ
@endsection
@section('css')
<link href="/vendors/select2/select2.min.css" rel="stylesheet" />
<link href="/adminpb/product/add/add.css" rel="stylesheet" />
@endsection
@section('js')
<script src="https://kit.fontawesome.com/8d4be1a171.js" crossorigin="anonymous"></script>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="customer">
            @foreach($orders as $key => $order)
                <h3 class="pt-3">Chi tiết đơn hàng</h3>
                <ul>
                    <li>Tên Khách Hàng: {{ $order->users->name }} </li>
                    <li>Số Điện Thoại: {{ $order->users->phone }} </li>
                    <li>Email: {{ $order->users->email }}</li>
                    <li>Địa Chỉ:{{ $order->users->address }} </li>
                    <li>Ngày Đặt Hàng: {{ $order->created_at }}</li>
                </ul>
            @endforeach
            @php
                $total = 0;
            @endphp
            <div class="row">
                <div class="col-12">
                    <div class="card mt-2">
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Img</th>
                                    <th>Price</th>
                                    <th>Quantiy</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $key => $order)
                                        @foreach($order->order_details as $key => $order_detail)
                                            @php
                                                $total += $order_detail->price * $order_detail->quantity;
                                            @endphp
                                            <tr>
                                                <td style="width: 36vw; word-break: break-word; white-space: pre-line;;">{{ $order_detail->products->name }}</td>
                                                <td><img style="width: 100px" src="/storage/{{ $order_detail->products->thumb }}" alt=""></td>
                                                <td>{{ number_format($order_detail->price, 0, ',', ' ') }}</td>
                                                <td>{{ $order_detail->quantity }}</td>
                                                <td>{{ number_format($order_detail->price * $order_detail->quantity, 0, ',', ' ') }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-right">Tổng tiền</td>
                                            <td>{{ number_format($total, 0, ',', ' ') }}</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
@endsection
@section('js')
<script src="/vendors/select2/select2.min.js"></script>
<script src="https://cdn.tiny.cloud/1/2q5uk7z5qukawqm3hr88calcjg059jjdxuwxmlw5n1qheali/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
<script src="/adminpb/product/add/add.js"></script>

@endsection