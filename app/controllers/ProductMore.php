<?php

use App\core\Controller;

class ProductMore extends Controller {

    public function page($number) {

        $numberproduct = 6;

        if(isset($number)){

            $page = $number;
        
            settype($page, "int");
        
            $form = ($page - 1) * $numberproduct;

            $products = $this->model('Product')->getProductPage($form, $numberproduct);
        }

        $this->view('Client/Components/ProductMore', [
            'products' => $products
        ]);
    }
}
?>