@extends('layouts.admin')

@section('title')
Trang chủ
@endsection
@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
<div class="content-wrapper">
    @include('partials.content-header',['name'=>'Manage','key'=>'comment'])
    <div class="content">
        <div class="container-fluid">
            <table class="table">
                <thead>
                <tr>
                    <th style="width: 50px">ID</th>
                    <th>Tên Khách Hàng</th>
                    <th>Nội dung</th>
                    <th>Số Điện Thoại</th>
                    <th>Email</th>
                    <th>Ngày bình luận</th>
                    <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($comment_products as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            @if (!empty($comment->users))
                                <td>{{ $comment->users->name }}</td>
                                @if (strlen($comment->content) <= 20)  
                                    <td>{{ $comment->content }}</td>
                                @else
                                    <td>{{ substr($comment->content, 0, 20) . '...' }}</td>
                                @endif
                                <td>{{ $comment->users->phone }}</td>
                                <td>{{ $comment->users->email }}</td>
                            @else 
                                <td>{{ $comment->name }}</td>
                                @if (strlen($comment->content) <= 20)  
                                    <td>{{ $comment->content }}</td>
                                @else
                                    <td>{{ substr($comment->content, 0, 20) . '...' }}</td>
                                @endif
                                <td>0123456789</td>
                                <td>{{ $comment->email }}</td>  
                            @endif
                            <td>{{ $comment->created_at }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.comment.show', ['id' => $comment->id]) }}">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-sm delete-comment" href="{{ route('admin.comment.delete', ['id' => $comment->id]) }}">
                                    <i class="fa-solid fa-xmark"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {!! $comment_products->links() !!}
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
@endsection
@section('js')
<script src="/vendors/sweetAlert/sweetalert2@11.js"></script>
<script src="/adminpb/product/index/list.js"></script>
<script>
    $(document).ready(function() {
        $('.delete-comment').click(function (e) {
            if (!confirm('Bạn có chắc chắn muốn xóa Bình luận này hay Không!')) {
                e.preventDefault();
            }
        })
    })
</script>
@endsection