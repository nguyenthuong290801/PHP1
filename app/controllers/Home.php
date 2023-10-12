<?php

use App\core\Controller;

class Home extends Controller
{

    public function index()
    {

        $this->view('Client/Pages/Home', []);
    }

    public function yield($section, $num)
    {
        $sectionParts = explode('/', $section);

        switch ($section)
        {
            case '/':
                $products_get = $this->model('Product')->getProduct(4);
                include_once './app/views/Client/Components/Banner.php';
                include_once './app/views/Client/Components/Home.php';
                include_once './app/views/Client/Layout/Footer.php';
                break;
            case "$section":
                if (count($sectionParts) == 2) {
                    $products_get = $this->productCategory($num = 1);
                    include_once "./app/views/Client/Components/" . $sectionParts[1] . ".php";
                } elseif (count($sectionParts) == 3 && ($sectionParts[2])) {
                    $products_get = $this->model('Product')->getSlugProduct($sectionParts[2]);
                    include_once "./app/views/Client/Components/" . $sectionParts[1] . ".php";
                }
                break;
        }
    }

    public function productCategory(int $num) {

        $product = $this->model('Product')->getProductCategory($num);

        return $product;
    }
    

    public function addToCart($id){

        $arrProduct =  $this->model('Product')->getIdProduct($id);

        $this->model('Cart')->addToCart($id, 1, $arrProduct);
    }

    public function updateCart($product_id, $quantity){

        $this->model('Cart')->updateCart($product_id, $quantity);
    }

    public function removeFromCart($product_id){

        $this->model('Cart')->removeFromCart($product_id);
    }
}
