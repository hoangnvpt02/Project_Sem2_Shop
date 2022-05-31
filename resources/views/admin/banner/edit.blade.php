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
                    <form action="{{ route('admin.banner.update',['id'=>$banner->id])}}" method="Post">
                        @csrf
                        <div class="form-group">
                            <label>Image</label>
                            <input name="image" value="{{ $banner->image }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Danh mục</label>
                            <select name="category_id" id="" class="form-control select2_init" value="0">
                                <option value="">Lựa chọn</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($category->id == $banner->category_id) selected @endif>{{ $category->name }}</option>
                               
                                @endforeach
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