@extends('layouts.admin')

@section('title')
Trang chủ
@endsection
@section('js')
<script src="/vendors/sweetAlert/sweetalert2@11.js"></script>
<script src="/adminpb/product/index/list.js"></script>
@endsection
@section('content')
<div class="content-wrapper">
    @include('partials.content-header',['name'=>'Product','key'=>'List'])
    @if(session('success'))
    <div class="alert alert-success col-md-3">
        {{ session('success') }}
    </div>
    @endif
    <div class="content">
        <div class="container-fluid">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Tên Khách Hàng</th>
                    <th>Số Điện Thoại</th>
                    <th>Email</th>
                    {{-- <th>Địa Chỉ</th> --}}
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
                        {{-- <td>{{ $order->users->address }}</td> --}}
                        <td>{{ $order->users->created_at }}</td>
                        <td>{{ $order->users->status == 1 ? 'Chưa xác nhận' : 'Đã hủy' }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" onclick="updateRow({{ $order->id }}, '/admin/order->userss/confirm')">
                                <i class="fa-solid fa-check"></i>
                            </a>
                            <a class="btn btn-primary btn-sm" href="/admin/order/detail/{{ $order->id }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" onclick="removeRow({{ $order->id }}, '/admin/customers/destroy')">
                                <i class="fa-solid fa-xmark"></i>
                            </a>
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