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
                            <label>Tên Sản Phẩm</label>
                            <input name="name" class="form-control" value="{{ $product->name }}" placeholder="Nhập tên Sản phẩm">
                        </div>
                        <div class="form-group">
                            <label>Giá sản phẩm</label>
                            <input name="price" class="form-control" value="{{ $product->price }}" placeholder="Nhập giá Sản phẩm">
                        </div>
                        <div class="form-group">
                            <label>Ảnh đại diện SP</label>
                            <input type="file" name="thumb" id="upload-file-imagethumb" class="form-control-file" multiple>
                            <a class="deleteImage-subphoto" href="{{ route('admin.product.deleteImage',['id'=>$product->id])}}">Delete</a>
                            <img width="50%" id="preview-imagethumb" src="{{ asset("$product->thumb") }}" alt="your image" />
                        </div>

                        <div class="form-group">
                            <label>List ảnh phụ SP
                                <input type="number" value="1" id="amount-upload-file-subphoto" oninput="changeAmountUploadFileSubPhoto()">
                            </label>
                            <div class="image-subphoto">
                                <div class="subphoto">
                                    <input type="file" name="subphoto[]" id="upload-file-subphoto" class="form-control-file" multiple>
                                    <img id="preview-subphoto" src="#" alt="your image" />
                                </div>
                                @foreach($product_image as $image)
                                    <div class="subphoto">
                                        <a class="deleteImage-subphoto" href="{{ route('admin.product.deleteImage',['id'=>$image->id])}}">Delete</a>
                                        <img width="50%" id="preview-subphoto{{ $image->id }}" src="{{ asset("/storage/$image->image") }}"/>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Chọn danh mục</label>
                            <select name="category_id" id="">
                                <option value="">Chọn danh mục</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
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
<script>
    function changeAmountUploadFileSubPhoto() {
        var amount = $('#amount-upload-file-subphoto').val();

        if (amount != 0 && amount >= 1) {
            for (let i = 1; i < amount; i++) {
                $('.image-subphoto').append(`
                    <div class="subphoto">
                        <input type="file" name="subphoto[]" id="upload-file-subphoto" class="form-control-file" multiple>
                        <img id="preview-subphoto${i}" src="#" alt="your image" />
                    </div>
                `);
            }
        }
    }
</script>
@endsection