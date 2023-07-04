<?php

namespace App\Controllers;

class Coba extends BaseController
{
    public function index($seg1, $seg2 = "")
    {
        echo "Ini controller coba method index $seg1 $seg2";
    }
}
