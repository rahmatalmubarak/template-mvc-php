<?php

namespace SistemPendukungKeputusan\UINIB\PHP\MVC\App;

class View
{

    public static function render(string $view, array $response = NULL)
    {
        require __DIR__ . '/../View/' . $view . '.php';
    }

}