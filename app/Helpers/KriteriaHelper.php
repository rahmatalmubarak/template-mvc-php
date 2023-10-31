<?php
namespace SistemPendukungKeputusan\UINIB\PHP\MVC\Helpers;

use SistemPendukungKeputusan\UINIB\PHP\MVC\Models\DataKriteria;

class KriteriaHelper{
    private $dataKriteria;
    public function __construct() {
        $this->dataKriteria = new DataKriteria;
    }
}