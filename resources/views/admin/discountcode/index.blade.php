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
    @include('partials.content-header',['name'=>'DiscountCode','key'=>'List'])
    @if(session('success'))
    <div class="alert alert-success col-md-3">
        {{ session('success') }}
    </div>
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                   
                    <a href="{{ route('admin.discountcode.add')}}" class="btn btn-success float-right m-2">Add</a>
                   
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="col-md-3">STT</th>
                                <th scope="col" class="col-md-3">Code</th>
                                <th scope="col" class="col-md-6">Price</th>
                                <th scope="col" class="col-md-6">Start Time</th>
                                <th scope="col" class="col-md-6">End Time</th>
                                <th scope="col" class="col-md-6">Product</th>
                                <th scope="col" class="col-md-6">Người đăng</th>
                                <th scope="col" class="col-md-6">Người cập nhật</th>
                                <th scope="col" class="col-md-6">Status</th>
                                <th scope="col" class="col-md-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($discounts_code as $discountcode)
                            <tr>
                                <th scope="row">{{ $discountcode->id }}</th>
                                <td>{{ $discountcode->code }}</td>
                                <td>{{ $discountcode->price }}</td>
                                <td>{{ $discountcode->start_time }}</td>
                                <td>{{ $discountcode->end_time }}</td>
                                <td>{{ $discountcode->products->name }}</td>
                                <td>{{ $discountcode->created_by }}</td>
                                <td>{{ $discountcode->updated_by }}</td>
                                <td>{{ $discountcode->status == 0 ? 'không hoạt động' : 'hoạt động' }}</td>
                                <td>
                                    <a href="{{ route('admin.discountcode.edit',['id'=>$discountcode->id])}}"
                                        class="btn btn-success">Edit</a>
                                    <a href="" data-url="{{ route('admin.discountcode.delete',['id'=>$discountcode->id])}}"
                                        class="btn btn-danger action_delete">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {!! $discounts_code->links() !!}
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