@extends('layouts.admin')

@section('title')
Trang chủ
@endsection
@section('js')
<script src="/vendors/sweetAlert/sweetalert2@11.js"></script>
<script src="/adminpb/product/index/list.js"></script>
<script>
    function detailReceipt(id) {
        // alert(id);
    $.ajax({
        url: '/admin/receipt/detailReceipt/' + id,
        type: 'GET',
        data: $(this).serialize(),
    }).done(function(reponse) {
        $(".table").fadeTo("slow",0.5);
        $("#kqdh").html(reponse);
    })
}
</script>
@endsection
@section('content')
<div class="content-wrapper">
    @include('partials.content-header',['name'=>'Receipt','key'=>'List'])
    @if(session('success'))
    <div class="alert alert-success col-md-3">
        {{ session('success') }}
    </div>
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('admin.receipt.add')}}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <div id="kqdh" style="z-index:5;position:absolute"></div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Emai</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Chi tiết hóa đơn</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($receipts as $receipt)
                            <tr>
                                <th scope="row">{{ $receipt->id }}</th>
                                <td>{{ $receipt->name }}</td>
                                <td>{{ $receipt->address }}</td>
                                <td>{{ $receipt->phone }}</td>
                                <td>{{ $receipt->email }}</td>
                                <td>{{ $receipt->status == 0 ?'New':'old' }}</td>
                                <td><a href="javascript:" onclick="detailReceipt({{ $receipt->id }})">Chi tiết hóa đơn</a></td>
                                <td>
                                    <a href="{{ route('admin.receipt.edit',['id'=>$receipt->id])}}"
                                        class="btn btn-success">Edit</a>
                                    <a href="" data-url="{{ route('admin.receipt.delete',['id'=>$receipt->id])}}"
                                        class="btn btn-danger action_delete">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {!! $receipts->links() !!}
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<div id="kq"></div>
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
@endsection