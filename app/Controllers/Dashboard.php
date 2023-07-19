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
        $validation = session()->getFlashdata("error");

        $data = [
            'header' => 'Comics App | Create',
            "name" => "Create Comic",
            "validation" => $validation
        ];

        return view("dashboard/create", $data);
    }

    public function save()
    {
        if (!$this->validate([
            "title" => "required|is_unique[comic.title]",
            "author" => "required",
            "publisher" => "required",
            "cover" => "required"
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('error', $validation);
            return redirect()->back()->withInput()->with("validation", $validation);
        }

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

    public function delete($id)
    {
        $this->comicModel->delete($id);

        session()->setFlashdata("flash", "dihapus");

        return redirect()->to("/comic");
    }

    public function edit($slug)
    {
        $validation = session()->getFlashdata("error");

        $data = [
            'header' => 'Comics App | Edit',
            "name" => "Edit Comic",
            "validation" => $validation,
            "comic" => $this->comicModel->getComic($slug)
        ];

        return view("dashboard/edit", $data);
    }

    public function update($id)
    {
        $oldComic = $this->comicModel->getComic($this->request->getVar("slug"));

        if ($oldComic["title"] == $this->request->getVar("title")) {
            $rule_title = "required";
        } else {
            $rule_title = "required|is_unique[comic.title]";
        }

        if (!$this->validate([
            "title" => $rule_title,
            "author" => "required",
            "publisher" => "required",
            "cover" => "required"
        ])) {
            $validation = \Config\Services::validation();

            session()->setFlashdata('error', $validation);
            return redirect()->back()->withInput()->with("validation", $validation);
        }

        $this->comicModel->save([
            "id" => $id,
            "title" => $this->request->getVar("title"),
            "slug" => url_title($this->request->getVar("title"), "-", true),
            "author" => $this->request->getVar("author"),
            "publisher" => $this->request->getVar("publisher"),
            "cover" => $this->request->getVar("cover")
        ]);

        session()->setFlashdata("flash", "diubah");

        return redirect()->to("/comic");
    }
}
