<aside class="main-sidebar border border-top-0 position-fixed">
    <!-- Brand Logo -->
    <a class="navbar-brand p-2" href="#"><img src="./public/assets/img/logo.png" alt="logo" class="img-fluid" width="200;"></a>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info">
                <a href="#" class="d-block"></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar rounded" type="search" placeholder="Tìm kiếm" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar bg-cyan">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link bg-navy">
                        <p class="text-light">
                            Bảng điều khiển
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-black">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Chức năng
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item nav-hover rounded my-2">
                            <div class="d-flex ml-3 productadmin" style="cursor: pointer;">
                                <p class="py-2 m-0">Danh sách sản phẩm</p>
                            </div>
                        </li>
                        <li class="nav-item nav-hover rounded my-2">
                            <div class="d-flex ml-3 productdelete" style="cursor: pointer;">
                                <p class="py-2 m-0">Danh sách lưu trữ</p>
                            </div>
                        </li>
                        <li class="nav-item nav-hover rounded my-2">
                            <div class="d-flex ml-3 formadmin" style="cursor: pointer;">
                                <p class="py-2 m-0">Thêm sản phẩm</p>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul>
                <form action="" method="POST">
                    <!-- <button type="submit" name="logout">Đăng xuất</button> -->
                    <input type="submit" class="btn bg-navy position-absolute bottom-0 start-0 my-2 mx-2" style="width:230px;" name="logout" value="Đăng xuất">
                </form>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<script>
    $(document).ready(function() {
        $('.nav-hover').click(function() {
            // Xóa class "text-orange" từ tất cả các thẻ a trong .nav-hover trước khi thêm lại vào thẻ a được nhấp vào
            $('.nav-hover').removeClass('bg-navy');

            // Thêm class "text-orange" vào thẻ a được nhấp vào
            $(this).addClass('bg-navy');
        });
    });
</script>