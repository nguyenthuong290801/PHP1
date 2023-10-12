<div class="content-wrapper bg-white">
  <!-- Modal -->
  <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" class="text-center" id="successModalLabel">Thêm dữ liệu thành công!</h5>
        </div>
      </div>
    </div>
  </div>
  <form id="addForm" method="post" enctype="multipart/form-data" class="mx-4 mt-3">
    <div class="mb-3">
      <label for="" class="form-label">Tên sản phẩm *</label>
      <input type="text" class="form-control" id="name_product">
      <small class="text-danger"></small>
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Giá *</label>
      <input type="text" class="form-control" id="price">
      <small class="text-danger"></small>
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Miêu tả sản phẩm</label>
      <textarea class="form-control" id="summernote"></textarea>
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Hình ảnh *</label>
      <input type="file" class="form-control" id="image">
      <small class="text-danger"></small>
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Loại *</label>
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
      <small class="text-danger"></small>
    </div>
    <button id="btn_insert" class="btn bg-navy w-100 btn_insert mb-5">Thêm</button>
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
    $('#btn_insert').on("click", function(e) {
      e.preventDefault();
      var errorModal = $('#errorForm');
      var name_product = $('#name_product').val();
      var price = $('#price').val();
      var description = $('#summernote').val();
      var image = $('#image')[0].files[0];
      var category_id = $('#category_id').val();

      if (name_product == '' || price == '' || !image || category_id == '') {
        if (name_product == '') {
          $('#name_product').next('.text-danger').text('Hãy điền vào tên sản phẩm');
        } else {
          $('#name_product').next('.text-danger').text('');
        }

        if (price == '') {
          $('#price').next('.text-danger').text('Hãy điền vào giá tiền');
        } else {
          $('#price').next('.text-danger').text('');
        }

        if (!image) {
          $('#image').next('.text-danger').text('Hãy thêm hình ảnh');
        } else {
          $('#image').next('.text-danger').text('');
        }

        if (category_id == '') {
          $('#category_id').next('.text-danger').text('Hãy chọn loại sản phẩm');
        } else {
          $('#category_id').next('.text-danger').text('');
        }
      } else {
        var formData = new FormData();
        formData.append('name_product', name_product);
        formData.append('price', price);
        formData.append('description', description);
        formData.append('image', image);
        formData.append('category_id', category_id);

        $.ajax({
          url: "/admin/processFormData",
          method: "POST",
          data: formData,
          processData: false,
          contentType: false,
          success: function(data) {
            $('#addForm')[0].reset();
            $('#successModal').modal('show');
          } 
        });
      }
    });
  });
</script>