<?php

use App\core\Database;


class Cart
{
    protected $db;
    private $cart;

    public function __construct()
    {   
        $this->db = new Database();

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function addToCart($product_id, $quantity, $arrProduct)
    {
        foreach($arrProduct as $product){
            $name = $product['name_product'];
            $image = $product['image'];
            $sale_price = $product['price'];
        }

        if (!isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] = [];
        }
    
        // Kiểm tra nếu sản phẩm đã được thêm vào giỏ hàng trước đó
        $product = $_SESSION['cart'][$product_id];
        if (!empty($product)) {
            // Tăng số lượng sản phẩm trong giỏ hàng
            $product['quantity'] += $quantity;
        } else {
            // Thêm sản phẩm mới vào giỏ hàng
            $product = [
                'product_id' => $product_id,
                'quantity' => $quantity,
                'name' => $name,
                'image' => $image,
                'price' => $sale_price
            ];
        }
    
        // Cập nhật lại sản phẩm trong giỏ hàng
        $_SESSION['cart'][$product_id] = $product;
    }

    public function removeFromCart($product_id)
    {
        if (isset($_SESSION['cart'][$product_id]))
        {
            unset($_SESSION['cart'][$product_id]);
        }
    }

    public function updateCart($product_id, $quantity)
    {
        if (isset($_SESSION['cart'][$product_id]) && $quantity > 0)
        {
            $_SESSION['cart'][$product_id]['quantity'] = $quantity;
        }
    }

}