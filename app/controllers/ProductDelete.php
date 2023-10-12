<?php

use App\core\Controller;

class ProductDelete extends Controller {
    
    public function index() {

        $products_get = $this->model('Product')->getProductDelete(12);
        
        $this->view('Admin/Layout/ProductDelete', [
            'products_get' => $products_get
        ]);
    }
}
