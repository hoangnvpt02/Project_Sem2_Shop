@extends('layouts.admin')

@section('title')
Trang chủ
@endsection
@section('content')
<div class="content-wrapper">
    @include('partials.content-header',['name'=>'Discount Code','key'=>'edit'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                <form action="{{ route('admin.discountcode.update',['id'=>$discountcode->id])}}" method="Post">
                        @csrf
                        <div class="form-group">
                            <label>Code</label>
                            <input name="code" class="form-control" value="{{ $discountcode->code }}">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input name="price" class="form-control" value="{{ $discountcode->price }}">
                        </div>
                        <div class="form-group">
                            <label>Start time</label>
                            <input name="start_time" class="form-control" value="{{ $discountcode->start_time }}">
                        </div>
                        <div class="form-group">
                            <label>End time</label>
                            <input name="end_time" class="form-control" value="{{ $discountcode->end_time }}">
                        </div>
                        <div class="form-group">
                            <label>Product</label>
                            <select name="product_id" id="" class="form-control select2_init" value="0">
                                
                                @foreach($products as $product)
                                <option value="{{ $product->id }}" @if($product->id == $discountcode->product_id) selected @endif>{{ $product->name }}</option>
                                @endforeach
                            </select>
                           
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status" id="" class="form-control select2_init" value="0">
                                <option value="">Lựa chọn</option>
                                <option value="0" @if($discountcode->status == 0) selected @endif>Không hoạt động</option>
                                <option value="1" @if($discountcode->status != 0) selected @endif>Hoạt động</option>
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