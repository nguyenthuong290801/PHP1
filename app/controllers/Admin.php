<?php

use App\core\Controller;

class Admin extends Controller
{
    // load đầu tiên khi vào admin
    public function index()
    {

        $products_get = $this->model('Product')->getProduct(20);

        $this->view('Admin/MainAdmin', [
            'products_get' => $products_get,
        ]);
    }

    // Lấy thông tin của id product truyền qua Ajax
    public function getIdProduct($id)
    {
        $product = $this->model('Product')->getIdProduct($id);

        echo json_encode($product);
    }

    public function createSlug($string)
    {
        $slug = strtolower(trim(preg_replace('/[^a-zA-Z0-9]+/', '-', $string), '-'));
        return $slug;
    }


    // Xử lý hình ảnh
    public function uploadFile($file, $target_dir)
    {
        // Lấy tháng và năm hiện tại
        $currentMonth = date("m");
        $currentYear = date("Y");

        // Tạo đường dẫn đến thư mục mới
        $newDir = $target_dir . $currentMonth . '/' . $currentYear . '/';

        // Kiểm tra xem thư mục đã tồn tại chưa
        if (!file_exists($newDir)) {
            // Tạo thư mục mới
            if (!mkdir($newDir, 0777, true)) {
                // $_SESSION['error']['folder'] = 'Không thể tạo thư mục mới';
                return false;
            }
        }

        // Tạo tên file duy nhất dựa trên thời gian
        $target_file = $newDir . time() . '_' . basename($file['name']);

        // Di chuyển tệp tin từ đường dẫn tạm thời tới đường dẫn mới được chỉ định.
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            return false;
        }
    }


    // Hàm chung để xử lý dữ liệu
    public function processFormData($id = null)
    {

        $requiredFields = ['name_product', 'price', 'description', 'category_id'];

        // Kiểm tra xem các trường bắt buộc đã được điền và tệp tin đã được gửi lên
        if (
            isset($_POST['name_product']) &&
            // !empty($_FILES['image']['name']) &&
            !array_diff($requiredFields, array_keys($_POST))
        ) {

            $name_product = $_POST['name_product'];
            $slug = $this->createSlug($name_product);
            $price = $_POST['price'];
            $description = $_POST['description'];
            $category_id = $_POST['category_id'];

            // Đường dẫn định dạng
            $target_dir = "./public/assets/uploadimage/";

            $image = $_FILES['image'];

            $imagepath = $this->uploadFile($image, $target_dir);
            $productData = [
                'name_product' => $name_product,
                'slug' => $slug,
                'price' => $price,
                'description' => $description,
                'image' => $imagepath,
                'category_id' => $category_id
            ];

            // Xác định action là insert hoặc update dựa trên có tồn tại id hay không
            if (isset($id)) {
                $productData['id'] = $id;
                $this->update($productData);
            } else {
                $this->insert($productData);
            }
        } else {
            // $_SESSION['error']['form'] = 'Vui lòng điền đầy đủ thông tin và tải lên hình ảnh';
        }
    }

    // Thêm dữ liệu vào database
    public function insert($productData)
    {
        $this->model('Product')->setProduct($productData);
    }

    // Nhận dữ liệu từ browser và sửa dữ liệu có id trùng với id của tabel products
    public function update($productData)
    {
        $this->model('Product')->updateProduct($productData);
    }

    // Nhận id từ browser và xóa product trong tabel products 
    public function delete($id, $num)
    {
        $this->model('Product')->deleteProduct($id, $num);
    }

    public function restore($id)
    {
        $this->model('Product')->restoreProduct($id);
    }
}
