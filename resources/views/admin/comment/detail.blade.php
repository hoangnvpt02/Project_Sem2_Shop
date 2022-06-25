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
            <h3 class="pt-3">Chi tiết bình luận</h3>
            <ul>
                <li>Nội dung : {{ $comment_products->content }} </li>
                @if (!empty($comment->users))
                    <li>Tên Khách Hàng : {{ $comment_products->users->name }} </li>
                    <li>Số Điện Thoại : {{ $comment_products->users->phone }} </li>
                    <li>Email : {{ $comment_products->users->email }}</li>
                @else
                    <li>Tên Khách Hàng : {{ $comment_products->name }} </li>
                    <li>Số Điện Thoại : Không có </li>
                    <li>Email : {{ $comment_products->email }}</li>
                @endif
                <li>Ngày bình luận :{{ $comment_products->created_at }} </li>
            </ul>
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