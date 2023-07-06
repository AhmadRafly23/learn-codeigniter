<?php

namespace App\Controllers;

use App\Models\ComicModel;

class Dashboard extends BaseController
{
    protected $comicModel;

    public function __construct()
    {
        $this->comicModel = new \App\Models\ComicModel();
    }

    public function index()
    {
        $data = [
            'header' => 'Comics App | Dashboard',
            "name" => "Dashboard"
        ];
        return view('dashboard/index', $data);
    }

    public function comic()
    {
        $comic = $this->comicModel->getComic();

        $data = [
            'header' => 'Comics App | Comic',
            "name" => "List Comic",
            "comic" => $comic
        ];

        return view("dashboard/comic", $data);
    }

    public function detail($slug)
    {
        $comic = $this->comicModel->getComic($slug);

        $data = [
            'header' => 'Comics App | Detail',
            "name" => "Detail Comic",
            "comic" => $comic
        ];

        return view("dashboard/detail", $data);
    }
}
