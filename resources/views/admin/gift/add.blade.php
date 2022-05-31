@extends('layouts.admin')

@section('title')
Trang chủ
@endsection

@section('content')
<div class="content-wrapper">
    @include('partials.content-header',['name'=>'Gift','key'=>'add'])
    @if(count($errors) > 0)
    @foreach($errors->all() as $err)
    <div class="alert alert-danger col-md-4">
        {{ $err}}
    </div>
    @endforeach
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('admin.gift.store')}}" method="Post">
                        @csrf
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input name="images" class="form-control" placeholder="Nhập hình ảnh">
                        </div>
                        <div class="form-group">
                            <label>Points</label>
                            <input name="points" class="form-control" placeholder="Nhập Points">
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status" id="" class="form-control select2_init" value="0">
                                <option value="">Lựa chọn</option>
                                <option value="0">Không hoạt động</option>
                                <option value="1">Hoạt động</option>
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