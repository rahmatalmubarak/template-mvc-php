<?php

namespace  ProgrammerZamanNow\Belajar\PHP\MVC\Models;
use ProgrammerZamanNow\Belajar\PHP\MVC\Models\Database;

class Product
{
    public function allData(){
        $result = Database::query("SELECT * FROM user");
        return $result;
    }
}
