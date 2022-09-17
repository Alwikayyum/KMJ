<?php

namespace App\Controllers;

use CodeIgniter\Model;
use App\Models\ArtikelModel;
use CodeIgniter\Database\Database;
use App\Controllers\BaseController;

class ArtikelController extends BaseController
{
    protected $dataArtikel;


    public function __construct()
    {
        $this->dataArtikel = new ArtikelModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Artikel | Karya Manunggal Jati',
            'dataArtikel' => $this->dataArtikel->getData()
        ];
        return view('pages/artikel', $data);
    }

    public function detail($id)
    {
        $where = ['selug' => $id];
        $artikel = $this->dataArtikel->getWhere($where);
        $data = [
            'title' => 'Detail Artikel | Karya Manunggal Jati',
            // 'detailArtikel' => $this->dataArtikel->getArtikel($slug)
            'dataArtikel' => $artikel
        ];

        return view('artikel/detail', $data);
    }
}
