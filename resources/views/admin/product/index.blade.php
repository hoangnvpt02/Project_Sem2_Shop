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
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.product.add')}}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12 col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Hình ảnh</th>
                                <th>Mô tả</th>
                                <th>Danh mục</th>
                                <th>Trạng thái</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td><img style="width: 100px" src="/storage/{{ $product->thumb}}" alt=""></td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->status == 0 ? 'không hoạt động' : 'hoạt động'}}</td>
                                <td>
                                    <a style="width: 70px; margin-bottom: 10px;" href="{{ route('admin.product.edit',['id'=>$product->id])}}"
                                        class="btn btn-success">Edit</a>
                                    <a style="width: 70px;" href="" data-url="{{ route('admin.product.delete',['id'=>$product->id])}}"
                                        class="btn btn-danger action_delete">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {!! $products->links() !!}
                </div>
            </div>
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