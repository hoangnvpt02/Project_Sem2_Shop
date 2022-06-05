<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                <a  href="{{ route('logout') }}" class="text-primary">Log Out</a>
            </div>
        </div>
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                    <a href="{{ route('admin.category.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Quản lý admin
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Danh mục sản phẩm
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.gift.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Gift
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.product.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Sản Phẩm</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.discount.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Discount</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.discountcode.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Discount Code</p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="{{ route('admin.user.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Danh sách nhân viên </p>
                    </a>
                </li> -->
              
              
                <!-- <li class="nav-item">
                    <a href="{{ route('admin.receipt.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Quản lý đơn hàng</p>
                    </a>
                </li> -->
            </ul>
        </nav>
    </div>
</aside>