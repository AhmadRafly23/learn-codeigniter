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
            "name" => "Create Comic",
        ];

        return view("dashboard/create", $data);
    }

    public function save()
    {
        if (!$this->validate([
            "title" => "required|is_unique[comic.title]",
            "author" => "required",
            "publisher" => "required",
            "cover" => "uploaded[cover]|max_size[cover, 1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]"
        ])) {

            return redirect()->to("/comic/create")->withInput()->with("validation", $this->validator->getErrors());
        }

        $fileCover = $this->request->getFile("cover");

        $nameCover = $fileCover->getRandomName();

        $fileCover->move("img", $nameCover);

        $this->comicModel->save([
            "title" => $this->request->getVar("title"),
            "slug" => url_title($this->request->getVar("title"), "-", true),
            "author" => $this->request->getVar("author"),
            "publisher" => $this->request->getVar("publisher"),
            "cover" => $nameCover
        ]);

        session()->setFlashdata("flash", "disimpan");

        return redirect()->to("/comic");
    }

    public function delete($id)
    {
        $comic = $this->comicModel->find($id);

        unlink("img/" . $comic["cover"]);

        $this->comicModel->delete($id);

        session()->setFlashdata("flash", "dihapus");

        return redirect()->to("/comic");
    }

    public function edit($slug)
    {
        $data = [
            'header' => 'Comics App | Edit',
            "name" => "Edit Comic",
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
            "cover" => "uploaded[cover]|max_size[cover, 1024]|is_image[cover]|mime_in[cover,image/jpg,image/jpeg,image/png]"
        ])) {

            return redirect()->to("/comic/edit")->withInput()->with("validation", $this->validator->getErrors());
        }

        $fileCover = $this->request->getFile("cover");

        if ($fileCover->getError() == 4) {
            $nameCover = $this->request->getVar("oldCover");
        } else {
            $nameCover = $fileCover->getRandomName();
            $fileCover->move("img", $nameCover);
            unlink("img/" . $this->request->getVar("oldCover"));
        }

        $this->comicModel->save([
            "id" => $id,
            "title" => $this->request->getVar("title"),
            "slug" => url_title($this->request->getVar("title"), "-", true),
            "author" => $this->request->getVar("author"),
            "publisher" => $this->request->getVar("publisher"),
            "cover" => $nameCover
        ]);

        session()->setFlashdata("flash", "diubah");

        return redirect()->to("/comic");
    }
}
