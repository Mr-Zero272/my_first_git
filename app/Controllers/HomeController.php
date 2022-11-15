<?php

namespace App\Controllers;
//use BackedEnum;

class HomeController extends BaseController
{
    public function index()
    {
        return $this->render('home/index');
    }
}
?>