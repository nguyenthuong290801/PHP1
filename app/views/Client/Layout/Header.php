<div class="containerfluid w-100 bg-white border-bottom">
    <div class="container">
        <header>
            <nav class="navbar navbar-expand-lg bg-white d-flex flex-column">
                <div class="container-fluid">
                    <div class="container d-none d-lg-block">
                        <div class="offcanvas-body w-100" style="height:70px;">
                            <div class="row align-items-center w-100">
                                <div class="col">
                                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                        <li class="nav-item mx-2">
                                            <a class="nav-link hover-link <?= ($_SERVER['REQUEST_URI'] === '/profile') ? 'active' : ''; ?>" href="profile">Thuongnapc04755@fpt.edu.vn</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col">
                                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 float-end">
                                        <li class="nav-item mx-2">
                                            <a class="nav-link hover-link <?= ($_SERVER['REQUEST_URI'] === '/') ? 'active' : ''; ?>" aria-current="page" href="/">Trang chủ</a>
                                        </li>
                                        <li class="nav-item mx-2">
                                            <a class="nav-link hover-link <?= ($_SERVER['REQUEST_URI'] === '/product') ? 'active' : ''; ?>" href="/product">Kho giao diện</a>
                                        </li>
                                        <li class="nav-item mx-2">
                                            <a class="nav-link hover-link <?= ($_SERVER['REQUEST_URI'] === '/login') ? 'active' : ''; ?>" href="/login">Đăng nhập</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <a class="navbar-brand" href="/"><img src="../public/assets/img/logo.png" alt="logo" class="img-fluid" width="200;"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <a class="navbar-brand" href="#"><img src="./public/assets/img/logo.png" alt="logo" class="img-fluid" width="200;"></a>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <form class="d-flex mt-3" role="search">
                            <div class="input-box">
                                <input class="border border-2 rounded-pill" placeholder="Tìm kiếm" aria-label="Search">
                                <button class="button rounded-pill"><img src="https://icongr.am/clarity/search.svg?size=28&color=ffffff" alt="img"></button>
                            </div>
                        </form>
                        <a class="button rounded-pill d-lg-none m-2" href="cart"><img src="https://icongr.am/clarity/shopping-cart.svg?size=28&color=ffffff" alt="img"></a>
                        <div class="offcanvas-body d-lg-none">
                            <ul class="navbar-nav mb-2 mb-lg-0">
                                <li class="nav-item mx-2">
                                    <a class="nav-link hover-link <?= ($_SERVER['REQUEST_URI'] === '/') ? 'active' : ''; ?>" aria-current="page" href="/">Trang chủ</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link hover-link <?= ($_SERVER['REQUEST_URI'] === '/product') ? 'active' : ''; ?>" href="product">Kho giao diện</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link hover-link <?= ($_SERVER['REQUEST_URI'] === '/profile') ? 'active' : ''; ?>" href="profile">Hồ sơ cá nhân</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link hover-link <?= ($_SERVER['REQUEST_URI'] === '/login') ? 'active' : ''; ?>" href="login">Đăng nhập</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a class="button rounded-pill d-none d-lg-block m-2 position-relative" href="/cart"><img src="https://icongr.am/clarity/shopping-cart.svg?size=28&color=ffffff" alt="img">
                        <?php if (isset($_SESSION['cart'])) : ?>
                            <?php foreach ($_SESSION['cart'] as $item) : ?>
                                <span class="bg-danger p-1 rounded-circle position-absolute top-0 start-75" style="font-size:14px;"><?= $item['quantity'] ?></span>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </a>
                </div>
    </div>
    </nav>
    </header>
</div>
</div>