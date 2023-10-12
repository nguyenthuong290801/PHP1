<?php

use App\core\Controller;

class ProductAdmin extends Controller {
    
    public function index() {

        $products_get = $this->model('Product')->getProduct(12);
        
        $this->view('Admin/Layout/ProductAdmin', [
            'products_get' => $products_get
        ]);
    }
}
