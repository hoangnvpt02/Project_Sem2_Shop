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
    <form action="{{ route('admin.product.update',['id'=>$product->id])}}" method="Post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <div class="form-group">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="col-form-label" for="name">Tên sản phẩm</label>
                                <input id="name" name="name" class="form-control" value="{{ $product->name }}" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="col-form-label" for="price">Giá sản phẩm</label>
                                <input id="price" name="price" value="{{ $product->price }}" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label class="col-form-label" for="category_id">Chọn danh mục</label>
                                <select name="category_id" class="form-control">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 10px">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label>Ảnh đại diện SP</label>
                                <input type="file" name="thumb" id="upload-file-imagethumb" class="form-control-file" multiple>
                                <img style="width: 20vw" class="mt-3 mb-1" id="preview-imagethumb" src="{{ asset("/storage/$product->thumb") }}" alt="your image" />
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 10px">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <label>Thêm ảnh phụ SP
                                    <input type="number" value="1" id="amount-upload-file-subphoto">
                                    <button onclick="changeAmountUploadFileSubPhoto()" type="button">Thêm</button>
                                </label>
                                <div class="image-subphoto">
                                    <div class="subphoto" style="margin-top: 5px">
                                        <input type="file" name="subphoto[]" id="upload-file-subphoto" class="form-control-file" multiple>
                                    </div>
    
                                    <div class="subphoto" style="margin-top: 5px; display: flex">
                                        @foreach($product_image as $image)
                                            <a href="{{ route('admin.product.deleteImage',['id'=>$image->id])}}">
                                                <span>x</span>
                                            </a>
                                            <img style="width: 20vw; margin-right: 10px" class="mt-3 mb-1" id="preview-subphoto" src="{{ asset("/storage/$image->image") }}" alt="your image" />
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="description" class="form-control" rows="8">{{ $product->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status" id="" value="0">
                            
                                <option value="0" @if($product->status == 0) selected @endif>Không hoạt động</option>
                                <option value="1" @if($product->status != 0) selected @endif>Hoạt động</option>
                            </select>
                        </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary tttttttttttt">Submit</button>
                    </div>
                </div>
            </div>
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
<script src="/js/product.js"></script>
@endsection