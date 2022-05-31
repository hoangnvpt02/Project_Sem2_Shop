@extends('layouts.admin')

@section('title')
Trang chủ
@endsection
@section('content')
<div class="content-wrapper">
    @include('partials.content-header',['name'=>'Category','key'=>'edit'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('admin.category.update',['id'=>$category->id])}}" method="Post">
                        @csrf
                        <div class="form-group">
                            <label>Tên danh mục</label>
                            <input name="name" value="{{ $category->name }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status" id="" class="form-control select2_init" value="0">
                                <option value="">Lựa chọn</option>
                                <option value="0" @if($category->status == 0) selected @endif>Không hoạt động</option>
                                <option value="1" @if($category->status != 0) selected @endif>Hoạt động</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<aside class="control-sidebar control-sidebar-dark">
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
@endsection