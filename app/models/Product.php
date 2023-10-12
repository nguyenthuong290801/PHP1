<?php

use App\core\Database;

class Product
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getProductPage($form = [], $numberproduct = [])
    {
        $sql = "SELECT name_product, price, description , image, category_id, created_at, id 
                FROM products
                ORDER BY id ASC
                LIMIT $form , $numberproduct";

        $result = $this->db->query($sql);
        $product = $result->fetchAll(PDO::FETCH_ASSOC);

        return $product;
    }

    public function getProduct($number)
    {
        $sql = "SELECT products.name_product, products.slug, products.price, products.description, products.image, products.category_id, products.created_at, products.id, categories.name AS category_name 
                FROM products 
                INNER JOIN categories ON products.category_id = categories.id
                WHERE products.deleted_at IS NULL
                ORDER BY id DESC 
                LIMIT $number";

        $result = $this->db->query($sql);
        $product = $result->fetchAll(PDO::FETCH_ASSOC);

        return $product;
    }

    public function getProductCategory($num)
    {
        $sql = "SELECT products.name_product, products.slug, products.price, products.description, products.image, products.category_id, products.created_at, products.id, categories.name AS category_name 
                FROM products 
                INNER JOIN categories ON products.category_id = categories.id
                WHERE products.deleted_at IS NULL AND products.category_id = $num
                ORDER BY id DESC";

        $result = $this->db->query($sql);
        $product = $result->fetchAll(PDO::FETCH_ASSOC);

        return $product;
    }

    public function getProductDelete($number)
    {
        $sql = "SELECT products.name_product, products.slug, products.price, products.description, products.image, products.category_id, products.created_at, products.id, categories.name AS category_name 
                FROM products 
                INNER JOIN categories ON products.category_id = categories.id
                WHERE products.deleted_at IS NOT NULL
                ORDER BY id DESC 
                LIMIT $number";

        $result = $this->db->query($sql);
        $product = $result->fetchAll(PDO::FETCH_ASSOC);

        return $product;
    }

    public function getSlugProduct($slug)
    {
        $sql = "SELECT products.name_product, products.price, products.description, products.image, products.category_id, products.created_at, products.id, categories.name AS category_name
                FROM products
                INNER JOIN categories ON products.category_id = categories.id
                WHERE products.slug = :slug
                ORDER BY id DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':slug', $slug);
        $stmt->execute();
        $product = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $product;
    }


    public function getProductAll()
    {
        $sql = "SELECT products.name_product, products.slug, products.price, products.description, products.image, products.category_id, products.created_at, products.id, categories.name AS category_name 
                FROM products 
                INNER JOIN categories ON products.category_id = categories.id 
                WHERE products.deleted_at IS NULL
                ORDER BY id DESC";

        $result = $this->db->query($sql);
        $product = $result->fetchAll(PDO::FETCH_ASSOC);

        return $product;
    }

    public function getIdProduct($id)
    {
        $sql = "SELECT name_product, price, description, image, category_id, id 
                FROM products 
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        $product = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $product;
    }



    public function setProduct(array $productData)
    {
        $name_product = $productData['name_product'];
        $slug = $productData['slug'];
        $price = $productData['price'];
        $description = $productData['description'];
        $image = $productData['image'];
        $category_id = $productData['category_id'];

        $sql = "INSERT INTO products (id, name_product, slug, price, description, image, created_at, updated_at, category_id) 
            VALUES (NULL, ?, ?, ?, ?, ?, current_timestamp(), current_timestamp(), ?)";

        $stmt = $this->db->prepare($sql);

        $stmt->execute([$name_product, $slug, $price, $description, $image, $category_id]);

        return $this->db->lastInsertId();
    }





    public function deleteProduct($productId, $num)
    {
        // Kiểm tra sản phẩm có tồn tại hay không
        $product = $this->getIdProduct($productId);
        if (!$product) {
            return false; // Sản phẩm không tồn tại, trả về false
        }

        if ($num == 0) {
            // Đánh dấu sản phẩm là đã xóa bằng cách đặt giá trị của cột "deleted_at" thành thời gian hiện tại
            $sql = "UPDATE products
                    SET deleted_at = NOW() 
                    WHERE id = :id";
        }elseif($num == 1) {
            $sql = "DELETE FROM products 
                    WHERE id = :id";
        }


        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $productId);
        $stmt->execute();

        // Kiểm tra số hàng bị ảnh hưởng từ câu truy vấn UPDATE
        if ($stmt->rowCount() > 0) {
            return true; // Đã xóa thành công
        } else {
            return false; // Không xóa thành công
        }
    }

    public function restoreProduct($productId)
    {
        // Kiểm tra sản phẩm có tồn tại hay không
        $product = $this->getIdProduct($productId);
        if (!$product) {
            return false; // Sản phẩm không tồn tại, trả về false
        }

        // Đặt giá trị của "deleted_at" thành NULL để khôi phục sản phẩm
        $sql = "UPDATE products 
                SET deleted_at = NULL
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $productId);
        $stmt->execute();

        // Kiểm tra số hàng bị ảnh hưởng từ câu truy vấn UPDATE
        if ($stmt->rowCount() > 0) {
            return true; // Khôi phục thành công
        } else {
            return false; // Không khôi phục thành công
        }
    }


    public function updateProduct(array $productData)
    {
        $id = $productData['id'];
        $name_product = $productData['name_product'];
        $price = $productData['price'];
        $description = $productData['description'];
        $category_id = $productData['category_id'];
        $image = $productData['image'];

        if ($image) {
            $sql = "UPDATE products 
            SET name_product = :name_product, price = :price, description = :description, image = :image, updated_at = current_timestamp(), category_id = :category_id
            WHERE id = :id";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name_product', $name_product);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':category_id', $category_id);
        } else {
            $sql = "UPDATE products 
            SET name_product = :name_product, price = :price, description = :description, updated_at = current_timestamp(), category_id = :category_id
            WHERE id = :id";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name_product', $name_product);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':category_id', $category_id);
        }

        $stmt->execute();
    }
}
