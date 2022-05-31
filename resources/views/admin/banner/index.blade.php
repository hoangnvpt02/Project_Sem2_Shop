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
    @include('partials.content-header',['name'=>'Banner','key'=>'List'])
    @if(session('success'))
    <div class="alert alert-success col-md-3">
        {{ session('success') }}
    </div>
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                   
                    <a href="{{ route('admin.banner.add')}}" class="btn btn-success float-right m-2">Add</a>
                   
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="col-md-3">STT</th>
                                <th scope="col" class="col-md-6">Hình ảnh</th>
                                <th scope="col" class="col-md-6">Danh mục</th>
                                <th scope="col" class="col-md-6">Người đăng</th>
                                <th scope="col" class="col-md-6">Người cập nhật</th>
                                <th scope="col" class="col-md-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($banners as $banner)
                            <tr>
                                <th scope="row">{{ $banner->id }}</th>
                                <td>{{ $banner->image }}</td>
                                <td>{{ $banner->categories->name }}</td>
                                <td>{{ $banner->created_by }}</td>
                                <td>{{ $banner->updated_by }}</td>
                                <td>
                                    <a href="{{ route('admin.banner.edit',['id'=>$banner->id])}}"
                                        class="btn btn-success">Edit</a>
                                    <a href="" data-url="{{ route('admin.banner.delete',['id'=>$banner->id])}}"
                                        class="btn btn-danger action_delete">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {!! $banners->links() !!}
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