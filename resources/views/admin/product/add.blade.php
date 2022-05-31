@extends('layouts.admin')

@section('title')
Trang chủ
@endsection
@section('css')
<link href="/vendors/select2/select2.min.css" rel="stylesheet" />
<link href="/adminpb/product/add/add.css" rel="stylesheet" />
@endsection
@section('content')
<div class="content-wrapper">
    @include('partials.content-header',['name'=>'Product','key'=>'add'])
    @if(count($errors) > 0)
    @foreach($errors->all() as $err)
    <div class="alert alert-danger col-md-4">
        {{ $err}}
    </div>
    @endforeach
    @endif
    <form action="{{ route('admin.product.store')}}" method="Post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <div class="form-group">
                            <label>Tên Sản Phẩm</label>
                            <input name="name" class="form-control" placeholder="Nhập tên Sản phẩm" value="{{ old('name')}}">
                            
                        </div>
                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input name="price" class="form-control" value="{{ old('name')}}" placeholder="Nhập giá Sản phẩm">
                        </div>
                        <div class="form-group">
                            <label>Ảnh đại diện SP</label>
                            <input type="text" name="thumb" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label>Chọn danh mục</label>
                            <select name="category_id" id="" class="form-control select2_init">
                               
                                <option value="">Chọn danh mục</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="description" class="form-control" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status" id="" value="0">
                                <option value="">Lựa chọn</option>
                                <option value="0">Không hoạt động</option>
                                <option value="1">Hoạt động</option>
                            </select>
                           
                        </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </form>
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