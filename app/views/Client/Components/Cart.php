<?php if (isset($_SESSION['user'])) : ?>
<div class="container-fluid mt-3">
    <!-- Tiêu đề -->
    <div class="container d-none d-lg-block">
        <div class="row my-3 shadow-sm p-2">
            <div class="col-6">
                <input type="checkbox" name="" id="checkAll" class="form-check-input mr-2" onclick="checkAll(this)">
                <span class="text-sm">Sản phẩm</span>
            </div>
            <div class="col-2"><span class="text-sm">Đơn Giá</span></div>
            <div class="col-2"><span class="text-sm">Số Lượng</span></div>
            <div class="col-2"><span class="text-sm">Thao tác</span></div>
        </div>
    </div>
    <div class="container">
        <!-- Nội dung các mục -->
        <?php if (isset($_SESSION['cart'])) : ?>
            <?php foreach ($_SESSION['cart'] as $item) : ?>
                <div class="row my-2 shadow-sm p-2 align-items-center">
                    <div class="col-12 col-lg-6">
                        <div class="row align-items-center">
                            <div class="col-4 col-sm-5">
                                <input type="checkbox" name="" id="" class="form-check-input m-2 m-lg-0"><span>
                                    <img src="<?= $item['image'] ?>" alt="img-banner" class="img-fluid p-5">
                            </div>
                            <div class="col-8 col-sm-5">
                                <div class="card-title text-sm"><?= $item['name'] ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 my-3 col-lg-2"><span>
                            <div class="text-danger h6"><?= number_format($item['price'], 0, ",", ".") ?>vnd</div>
                        </span></div>
                    <div class="col-5 p-0 col-lg-2">
                        <input type="number" class="form-control w-50" value="<?= $item['quantity'] ?>" data-product-id="<?= $item['product_id'] ?>">
                    </div>
                    <div class="col-3 col-lg-2">
                        <input type="button" class="button deleteCart" data-product-id="<?= $item['product_id'] ?>" value="Xóa">
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
        <!-- btn mua -->
        <div class="row my-3 shadow-sm p-2">
            <div class="col d-flex justify-content-end gap-2">
                <button class="btn btn-outline-success update">Cập nhập</button>
                <button class="btn btn-success"><a href="pay" class="text-light text-decoration-none">Thanh toán</a></button>
            </div>
        </div>
    </div>
</div>
<script>
    function checkAll(checkbox) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != checkbox)
                checkboxes[i].checked = checkbox.checked;
        }
    }
    // 
    $(document).ready(function() {
        $('input[type="number"]').on('change', function() {
            var productId = $(this).data('product-id');
            var quantity = $(this).val();

            $.ajax({
                url: 'home/updatecart/' + productId + '/' + quantity,
                method: 'POST',
                data: {
                    'productId': productId,
                    'quantity': quantity
                },
                success: function(response) {

                },
            });
        });
        // 
        $('.update').on('click', function() {
            location.reload();
        })
        // 
        $('.deleteCart').on('click', function() {
            var productId = $(this).data('product-id');

            $.ajax({
                url: 'home/removeFromCart/' + productId,
                method: 'DELETE',
                data: {
                    'productId': productId,
                },
                success: function(response) {
                    // alert(productId);
                },
            });
        });

    });
</script>
<?php
else :
    echo '<div class="text-center mt-5">Vui lòng đăng nhập trước khi mua hàng!  <a href="/login" class="text-orange text-decoration-none">Đăng nhập</a></div';
endif;
?>
