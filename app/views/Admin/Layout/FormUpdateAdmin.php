<div class="content-wrapper">
<input type="hidden" class="btn_edit button mx-4 mt-3" data-id="<?= $_POST['id_edit'] ?>"></input>
    <form id="editForm" method="post" enctype="multipart/form-data" class="mx-4 mt-3" id="editModal">
        <div class="mb-3">
            <label for="" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="name_product">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Giá</label>
            <input type="text" class="form-control" id="price">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Miêu tả sản phẩm</label>
            <textarea class="form-control" id="summernote"></textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Hình ảnh</label>
            <input type="file" class="form-control" id="image">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Loại</label>
            <select class="form-control" id="category_id">
                <option value="1">Thời trang - Trang sức</option>
                <option value="2">Mỹ phẩm - Làm đẹp</option>
                <option value="3">Thực phẩm - Nhà hàng</option>
                <option value="4">Đồ gia dụng - Sinh hoạt</option>
                <option value="5">Nội thất - Trang trí</option>
                <option value="6">Sách - Văn phòng phẩm</option>
                <option value="7">Thủ công - Mỹ nghệ - Quà tặng</option>
                <option value="8">Công nghệ - Kỹ thuật số</option>
                <option value="9">Ô tô - Xe máy</option>
                <option value="10">Thiết bị điện</option>
                <option value="11">Thể thao - Dịch vụ</option>
                <option value="12">Khác</option>
            </select>
        </div>
        <button class="button w-25 mb-5 btn_edit_more" id="editButton" data-id="<?= $_POST['id_edit'] ?>">Sửa</button>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Hãy nhập mô tả',
            tabsize: 2,
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        //
            var productId = $('.btn_edit').data('id'); 

            $.ajax({
                url: "admin/getidproduct/" + productId,
                method: "POST",
                success: function(response) {
                    var obj = JSON.parse(response);

                    $('#name_product').val(obj[0]['name_product']);
                    $('#price').val(obj[0]['price']);
                    $('#summernote').summernote('code', obj[0]['description']);
                    // Đặt giá trị hình ảnh vào phần tử hiển thị (ví dụ: thẻ img)
                    $('#image').val('./public/assets/uploadimage/' + obj[0]['image']);
                    $('#category_id').val(obj[0]['category_id']);

                },
            });
        // 
        $('.btn_edit_more').on("click", function(e) {
            e.preventDefault();

            var productId = $(this).data('id');
            var editModal = $('#editModal');


            var name_product = $('#name_product').val();
            var price = $('#price').val();
            var description = $('#summernote').val();
            var image = $('#image')[0].files[0];
            var category_id = $('#category_id').val();

            var formData = new FormData();
            formData.append('name_product', name_product);
            formData.append('price', price);
            formData.append('description', description);
            formData.append('image', image);
            formData.append('category_id', category_id);

            $.ajax({
                url: "/admin/processFormData/" + productId,
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    $('#successModal').modal('show');
                    editModal.modal('hide');
                    location.reload();
                },
            });

        });
        
    });
</script>