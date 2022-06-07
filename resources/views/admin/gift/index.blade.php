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
    @include('partials.content-header',['name'=>'Gift','key'=>'List'])
    @if(session('success'))
    <div class="alert alert-success col-md-3">
        {{ session('success') }}
    </div>
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                   
                    <a href="{{ route('admin.gift.add')}}" class="btn btn-success float-right m-2">Add</a>
                   
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Points</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Người đăng</th>
                                <th scope="col">Người cập nhật</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gifts as $gift)
                            <tr>
                                <th scope="row">{{ $gift->id }}</th>
                                <td>{{ $gift->points }}</td>
                                <td>{{ $gift->images }}</td>
                                <td>{{ $gift->status == 0 ? 'không hoạt động' : 'hoạt động' }}</td>
                                <td>{{ $gift->created_by }}</td>
                                <td>{{ $gift->updated_by }}</td>
                                <td>
                                    <a href="{{ route('admin.gift.edit',['id'=>$gift->id])}}"
                                        class="btn btn-success">Edit</a>
                                    <a href="" data-url="{{ route('admin.gift.delete',['id'=>$gift->id])}}"
                                        class="btn btn-danger action_delete">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {!! $gifts->links() !!}
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