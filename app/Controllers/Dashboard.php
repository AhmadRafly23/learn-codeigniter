<?php

namespace App\Controllers;

use App\Models\ComicModel;

class Dashboard extends BaseController
{
    protected $comicModel;

    public function __construct()
    {
        $this->comicModel = new ComicModel();
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

        if (empty($data["comic"])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Comic $slug not found");
        }

        return view("dashboard/detail", $data);
    }

    public function create()
    {
        $data = [
            'header' => 'Comics App | Create',
            "name" => "Create Comic"
        ];

        return view("dashboard/create", $data);
    }

    public function save()
    {
        $this->comicModel->save([
            "title" => $this->request->getVar("title"),
            "slug" => url_title($this->request->getVar("title"), "-", true),
            "author" => $this->request->getVar("author"),
            "publisher" => $this->request->getVar("publisher"),
            "cover" => $this->request->getVar("cover")
        ]);

        session()->setFlashdata("flash", "disimpan");

        return redirect()->to("/comic");
    }
}
