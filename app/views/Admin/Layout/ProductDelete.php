<?php

require_once './app/core/Database.php';
require_once './app/controllers/Admin.php';

?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col">

            </div>
            <div class="col-12">
                <!-- Modal confirm delete -->
                <div class="modal fade" style="padding-right: 0 !important;" id="confirmRestoreModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmRestoreModalLabel">Đã khôi phục</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <!--  -->
                <!-- Modal confirm delete -->
                <div class="modal fade" style="padding-right: 0 !important;" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="confirmDeleteModalLabel">Xác nhận xóa sản phẩm?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn bg-navy" id="confirmDeleteButton">Xóa</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dash-content">
                    <div class="activity">
                        <div class="activity-data">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 5%">STT</th>
                                        <th scope="col" style="width: 20%">Tên sản phẩm</th>
                                        <th scope="col" style="width: 20%">Giá sản phẩm</th>
                                        <th scope="col" style="width: 20%">Hình ảnh sản phẩm</th>
                                        <th scope="col" style="width: 20%">Danh mục sản phẩm</th>
                                        <th scope="col" style="width: 15%">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($data['products_get'])) : ?>
                                        <?php $i = 1;
                                        foreach ($data['products_get'] as $product) : ?>
                                            <tr class="product" data-id="<?= $product['id'] ?>">
                                                <td><?= $i ?></td>
                                                <td><?= substr($product['name_product'], 0, 100) ?></td>
                                                <td><?= number_format($product['price']) ?> vnd</td>
                                                <td><img src="<?= $product['image'] ?>" alt="img" class="img-fluid w-50"></td>
                                                <td><?= $product['category_name'] ?></td>
                                                <td>
                                                    <button class="btn bg-cyan btn_restore" data-id="<?= $product['id'] ?>">Khôi phục</button>
                                                    <button class="btn bg-navy btn_delete" data-id="<?= $product['id'] ?>">Xóa</button>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.btn_restore').on('click', function() {
            var productId = $(this).data('id');
            var row = $(this).closest('tr');

            $.ajax({
                url: "/admin/restore/" + productId,
                method: "POST",
                success: function(data) {
                    row.remove();
                    $('#confirmRestoreModal').modal('show');
                    $('#confirmRestoreModal').modal('hide');
                },
            });
        });
        //
        var isDeleting = false;

        $('.btn_delete').on('click', function() {
            var productId = $(this).data('id');
            var row = $(this).closest('tr');

            $('#confirmDeleteModal').modal('show');

            $('#confirmDeleteButton').off('click').on('click', function() {
                if (!isDeleting) {
                    isDeleting = true;

                    $.ajax({
                        url: "/admin/delete/" + productId + '/1',
                        method: "DELETE",
                        success: function(data) {
                            row.remove();
                            isDeleting = false;
                        },
                    });
                }
            });
        });
    });
</script>