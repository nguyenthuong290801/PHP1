<?php

use App\core\Controller;

class FormAdmin extends Controller
{

    public function index()
    {

        $this->view('Admin/Layout/FormAdmin', [
            
        ]);
    }
}
