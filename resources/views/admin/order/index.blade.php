@extends('layouts.admin')

@section('title')
Trang chủ
@endsection
@section('js')
<script src="/vendors/sweetAlert/sweetalert2@11.js"></script>
<script src="/adminpb/product/index/list.js"></script>
<script src="/js/order.js"></script>
@endsection
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="content-wrapper">
    @include('partials.content-header',['name'=>'Order','key'=>'List'])
    <div class="content">
        <div class="container-fluid">
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
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Tên Khách Hàng</th>
                    <th>Số Điện Thoại</th>
                    <th>Email</th>
                    <th>Địa Chỉ</th>
                    <th>Ngày Đặt Hàng</th>
                    <th>Xác nhận</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $key => $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->users->name }}</td>
                        <td>{{ $order->users->phone }}</td>
                        <td>{{ $order->users->email }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->users->created_at }}</td>
                        <td>
                            @if ($order->status == 1)
                                <span class="badge rounded-pill">Đang chờ xác nhận</span>
                            @elseif ($order->status == 2)
                                <span class="badge rounded-pill" style="background-color: green; color: white;">Đơn hàng đã xác nhận</span>
                            @elseif ($order->status == 3)
                                <span class="badge rounded-pill" style="background-color: blue; color: white;">Đang vận chuyển</span>
                            @elseif ($order->status == 4)
                                <span class="badge rounded-pill" style="background-color: green; color: white;">Đã nhận hàng thành công</span>
                            @elseif ($order->status == 0)
                                <span class="badge rounded-pill" style="background-color: red; color: white;">Đã hủy</span>
                            @endif
                        </td>
                        <td>
                            @if ($order->status == 1)
                                <a class="btn btn-primary btn-sm" onclick="confirmOrder({{ $order->id }}, '/admin/order/confirm')">
                                    <i class="fa-solid fa-check"></i>
                                </a>
                            @elseif ($order->status == 2)
                                <a class="btn btn-primary btn-sm" onclick="ship({{ $order->id }}, '/admin/order/ship')">
                                    <i class="fa-solid fa-truck-fast"></i>
                                </a>
                            @endif
                            <a class="btn btn-primary btn-sm" href="/admin/order/detail/{{ $order->id }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            @if ($order->status == 1)
                            <a class="btn btn-danger btn-sm" onclick="cancel({{ $order->id }}, '/admin/order/destroy')">
                                <i class="fa-solid fa-xmark"></i>
                            </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        
            {!! $orders->links() !!}
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
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