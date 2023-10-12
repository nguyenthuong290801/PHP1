<?php if (isset($products_get)) : ?>
    <?php foreach ($products_get as $product) : ?>
        <div class="container-fluid">
            <div class="container mb-5">
                <div class="row mt-3">
                </div>
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <h1><span class="text-uppercase fw-bolder"></span><?= $product['name_product'] ?></h1>
                        <p>Dola Fashion Accessories được thiết kế dành riêng cho cửa hàng phụ kiện thời trang: Giày, Dép, Túi xách,......</p>
                        <h3><?= number_format($product['price'], 0, ",", ".") ?>vnđ</h3>
                        <div class="row">
                            <div class="col">
                                    <button class="addToCart button rounded-pill" data-id="<?= $product['id'] ?>">
                                        <a href="/cart" class="text-light text-decoration-none">Chọn giao diện này</a>
                                    </button>
                            </div>
                        </div>
                    </div>
                    <div class="laptop col-12 col-md-6">
                        <div class="main-img"><img src="../public/assets/img/mockup.png" alt="">
                            <div class="screen">
                                <a href=".<?= $product['image'] ?>" data-fancybox data-caption="">
                                    <img src=".<?= $product['image'] ?>" alt="Mockup Image">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid bg-white">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <?= $product['description'] ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<div class="container-fluid">
    <div class="container m-t">
        <div class="row">
            <div class="col">
                <h6><span class="text-orange text-decoration-underline">LỰA CHỌN GIAO DIỆN THIẾT KẾ WEBSITE</span></h6>
                <h2><span class="text-orange">Các mẫu giao diện liên quan</span></h2>
            </div>
        </div>
        <div class="row gap-4 mt-5">
            <div class="col shadow-sm p-3 mb-5 bg-body rounded m-w">
                <div class="row h-hidden">
                    <div class="col p-0">
                        <img src="../public/assets/img/page1.jpg" class="img-fluid rounded hover-img">
                    </div>
                </div>
                <div class="row my-4">
                    <div class="col">
                        <h6>Mew Mall</h6>
                        <h6>2,500,000</h6>
                        <button class="button rounded-pill">Thêm vào giỏ hàng</button>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.addToCart').on('click', function() {
            var productId = $(this).data('id');
            $.ajax({
                url: "/home/addToCart/" + productId,
                method: "POST",
                success: function(data) {
                    
                },
            });
        });
        //
    });
</script>
