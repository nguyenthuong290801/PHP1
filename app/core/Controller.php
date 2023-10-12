<?php

namespace App\core;

class Controller
{
    //gọi model
    public function model($model)
    {
        require_once './app/models/' . $model . '.php';
        return new $model();
    }

    //gọi view
    public function view($view, $data = [])
    {
        require_once './app/views/' . $view . '.php';
    }
}
