<div class="container-fluid">
    <div class="container m-t">
        <div class="row">
            <div class="col">
                <button class="button" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Bộ lọc</button>

                <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                    <div class="offcanvas-header position-absolute end-0">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <h4>Danh mục</h4>
                        <div class="container">
                            <ul class="list-group">
                                <li class="p-2">
                                    <input class="form-check-input" type="checkbox" name="options" value="1" id="thoitrang" onclick="handleCheckboxChange(event)">
                                    <label style="cursor: pointer;" class="form-check-label" for="thoitrang">Thời trang - Trang sức</label>
                                </li>
                                <li class="p-2">
                                    <input class="form-check-input" type="checkbox" name="options" value="2" id="mypham" onclick="handleCheckboxChange(event)">
                                    <label style="cursor: pointer;" class="form-check-label" for="mypham">Mỹ phẩm - Làm đẹp</label>
                                </li>
                                <li class="p-2">
                                    <input class="form-check-input" type="checkbox" name="options" value="3" id="thucpham" onclick="handleCheckboxChange(event)">
                                    <label style="cursor: pointer;" class="form-check-label" for="thucpham">Thực phẩm - Nhà hàng</label>
                                </li>
                                </li>
                                <li class="p-2">
                                    <input class="form-check-input" type="checkbox" name="options" value="4" id="dogiadung" onclick="handleCheckboxChange(event)">
                                    <label style="cursor: pointer;" class="form-check-label" for="dogiadung">Đồ gia dụng - Sinh hoạt</label>
                                </li>
                                <li class="p-2">
                                    <input class="form-check-input" type="checkbox" name="options" value="5" id="noithat" onclick="handleCheckboxChange(event)">
                                    <label style="cursor: pointer;" class="form-check-label" for="noithat">Nội thất - Trang trí</label>
                                </li>
                                <li class="p-2">
                                    <input class="form-check-input" type="checkbox" name="options" value="6" id="sach" onclick="handleCheckboxChange(event)">
                                    <label style="cursor: pointer;" class="form-check-label" for="sach">Sách - Văn phòng phẩm</label>
                                </li>
                                <li class="p-2">
                                    <input class="form-check-input" type="checkbox" name="options" value="7" id="thucong" onclick="handleCheckboxChange(event)">
                                    <label style="cursor: pointer;" class="form-check-label" for="thucong">Thủ công - Mỹ nghệ - Quà tặng</label>
                                </li>
                                <li class="p-2">
                                    <input class="form-check-input" type="checkbox" name="options" value="8" id="congnghe" onclick="handleCheckboxChange(event)">
                                    <label style="cursor: pointer;" class="form-check-label" for="congnghe">Công nghệ - Kỹ thuật số</label>
                                </li>
                                <li class="p-2">
                                    <input class="form-check-input" type="checkbox" name="options" value="9" id="oto" onclick="handleCheckboxChange(event)">
                                    <label style="cursor: pointer;" class="form-check-label" for="oto">Ô tô - Xe máy</label>
                                </li>
                                <li class="p-2">
                                    <input class="form-check-input" type="checkbox" name="options" value="10" id="thietbidien" onclick="handleCheckboxChange(event)">
                                    <label style="cursor: pointer;" class="form-check-label" for="thietbidien">Thiết bị điện</label>
                                </li>
                                <li class="p-2">
                                    <input class="form-check-input" type="checkbox" name="options" value="11" id="thethao" onclick="handleCheckboxChange(event)">
                                    <label style="cursor: pointer;" class="form-check-label" for="thethao">Thể thao - Dịch vụ</label>
                                </li>
                                <li class="p-2">
                                    <input class="form-check-input" type="checkbox" name="options" value="12" id="khac" onclick="handleCheckboxChange(event)">
                                    <label style="cursor: pointer;" class="form-check-label" for="khac">Khác</label>
                                </li>
                            </ul>
                        </div>
                        <div class="container">
                            <h4>Bảng giá</h4>
                            <ul class="list-group">
                                <li class="p-2">
                                    <input class="form-check-input" type="checkbox" name="options" value="" id="mienphi" onclick="handleCheckboxChange(event)">
                                    <label style="cursor: pointer;" class="form-check-label" for="mienphi">Miễn phí</label>
                                </li>
                                <li class="p-2">
                                    <input class="form-check-input" type="checkbox" name="options" value="" id="500-1000" onclick="handleCheckboxChange(event)">
                                    <label style="cursor: pointer;" class="form-check-label" for="500-1000">500,000 - 1,000,000 đ</label>
                                </li>
                                <li class="p-2">
                                    <input class="form-check-input" type="checkbox" name="options" value="" id="1000-2000" onclick="handleCheckboxChange(event)">
                                    <label style="cursor: pointer;" class="form-check-label" for="1000-2000">1,000,000 - 2,000,000 đ</label>
                                </li>
                                <li class="p-2">
                                    <input class="form-check-input" type="checkbox" name="options" value="" id="2000-3000" onclick="handleCheckboxChange(event)">
                                    <label style="cursor: pointer;" class="form-check-label" for="2000-3000">2,000,000 - 3,000,000 đ</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <div class="container">
                    <div class="row gap-4">
                        <?php if (isset($products_get)) : ?>
                            <?php foreach ($products_get as $product) : ?>
                                <div class="col shadow-sm p-3 mb-5 bg-body rounded m-w">
                                    <div class="row h-hidden">
                                        <div class="col p-0">
                                            <img src="<?= $product['image'] ?>" class="img-fluid rounded hover-img">
                                        </div>
                                    </div>
                                    <div class="row my-4">
                                        <div class="col">
                                            <h6><?= $product['name_product'] ?></h6>
                                            <h6><?= number_format($product['price'], 0, ",", ".") ?>vnđ</h6>
                                            <button class="button rounded-pill">
                                                <a class="text-decoration-none text-light" href="productdetail/<?= $product['slug'] ?>">Xem thêm</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col text-center">
                    <a href="product" class="text-orange text-decoration-none">Xem thêm giao diện</a>
                    <img src="https://icongr.am/clarity/child-arrow.svg?size=28&color=f15a29" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function handleCheckboxChange(event) {
        const checkboxes = Array.from(document.getElementsByName('options'));
        checkboxes.forEach((checkbox) => {
            checkbox.checked = (checkbox === event.target);
        });

        // Lấy giá trị của tất cả các checkbox
        var checkboxValues = {};
        $('input[name=options]:checked').each(function() {
            checkboxValues[$(this).attr('id')] = $(this).val();
        });

        var num = Object.values(checkboxValues);

        var formData = new FormData();
        formData.append('num', num);

        $.ajax({
            url: '/product/' + num,
            type: 'POST',
            data: formData,
            success: function(data) {

            },
        });
    }
</script>