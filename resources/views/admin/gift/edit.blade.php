@extends('layouts.admin')

@section('title')
Trang chủ
@endsection
@section('content')
<div class="content-wrapper">
    @include('partials.content-header',['name'=>'Gift','key'=>'edit'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('admin.gift.update',['id'=>$gift->id])}}" method="Post">
                        @csrf
                        <div class="form-group">
                            <label>Points</label>
                            <input name="points" value="{{ $gift->points }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input name="images" value="{{ $gift->images }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status" id="" class="form-control select2_init" value="0">
                                <option value="0" @if($gift->status == 0) selected @endif>Không hoạt động</option>
                                <option value="1" @if($gift->status != 0) selected @endif>Hoạt động</option>
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