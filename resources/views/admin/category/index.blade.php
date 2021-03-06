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
        @include('partials.content-header', ['name' => 'Category', 'key' => 'List'])
        @if (session('success'))
            <div class="alert alert-success col-md-3">
                {{ session('success') }}
            </div>
        @endif
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <a href="{{ route('admin.category.add') }}" class="btn btn-success float-right m-2">Add</a>

                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Tên danh mục</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Người đăng</th>
                                    <th scope="col">Người cập nhật</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $category->id }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->status == 0 ? 'không hoạt động' : 'hoạt động' }}</td>
                                        <td>{{ $category->created_by }}</td>
                                        <td>{{ $category->updated_by }}</td>
                                        <td>
                                            <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}"
                                                class="btn btn-success">Edit</a>
                                            <a href=""
                                                data-url="{{ route('admin.category.delete', ['id' => $category->id]) }}"
                                                class="btn btn-danger action_delete">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        {!! $categories->links() !!}
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
