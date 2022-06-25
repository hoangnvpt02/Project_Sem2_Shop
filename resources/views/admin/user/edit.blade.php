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
                    <form action="{{ route('admin.user.update',['id'=>$user->id] )}}" method="Post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" class="form-control" value="{{ $user->name }}">
                        </div>
                        
                        <div class="form-group">
                            <label>Avatar</label>
                            <input name="avatar" class="form-control" value="{{ $user->avatar }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Nhập Password">
                        </div>
                        <div class="form-group">
                            <label>Điện thoại</label>
                            <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" name="address" class="form-control" value="{{ $user->address }}">
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