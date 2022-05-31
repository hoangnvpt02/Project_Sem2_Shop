@extends('layouts.admin')
@section('title')
Trang chủ
@endsection
@section('css')
<link href="/vendors/select2/select2.min.css" rel="stylesheet" />
<link href="/adminpb/product/add/add.css" rel="stylesheet" />
@endsection
@section('js')
<script src="/vendors/select2/select2.min.js"></script>
<script>
    $('.select2_init').select2({
        'placehoder':'chọn vai trò'
    });
</script>
@endsection
@section('content')
<div class="content-wrapper">
    @include('partials.content-header',['name'=>'Admin','key'=>'edit'])
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
                    <form action="{{ route('admin.admins.update',['id'=>$admin->id] )}}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" class="form-control" value="{{ $admin->name }}">
                        </div>
                        <div class="form-group">
                            <label>Tên đăng nhập</label>
                            <input name="user_login" class="form-control" value="{{ $admin->user_login }}">
                        </div>
                        <div class="form-group">
                            <label>Avatar</label>
                            <input name="avatar" class="form-control" value="{{ $admin->avatar }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $admin->email }}">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Nhập Password">
                        </div>
                        <div class="form-group">
                            <label>Điện thoại</label>
                            <input type="text" name="phone" class="form-control" value="{{ $admin->phone }}">
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status" id="" class="form-control select2_init" value="0">
                                <option value="">Lựa chọn</option>
                                <option value="0" @if($admin->status == 0) selected @endif >Không hoạt động</option>
                                <option value="1" @if($admin->status != 0) selected @endif>Hoạt động</option>
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