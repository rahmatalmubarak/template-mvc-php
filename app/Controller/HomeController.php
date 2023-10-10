<?php

namespace ProgrammerZamanNow\Belajar\PHP\MVC\Controller;

use ProgrammerZamanNow\Belajar\PHP\MVC\Models\Product;
use ProgrammerZamanNow\Belajar\PHP\MVC\App\View;

class HomeController
{
    function index(): void
    {
        $product = new Product();
        $product = $product->allData();
        $model = [
            "title" => "Belajar PHP MVC",
            "content" => "Selamat Belajar PHP MVC dari Programmer Zaman Now"
        ];
        View::render('Dashboard/Templates/header', $model);
        View::render('Dashboard/Templates/sidebar', $model);
        View::render('Home/index', $model);
        View::render('Dashboard/Templates/footer', $model);
    }

}