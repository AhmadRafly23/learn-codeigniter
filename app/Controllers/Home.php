<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home App',
            "nomor" => ["satu", "dua", "tiga"]
        ];
        return view('welcome_message', $data);
    }

    public function about()
    {
        echo "Ini adalah controller about";
    }
}
