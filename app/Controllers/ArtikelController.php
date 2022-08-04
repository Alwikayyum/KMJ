<?php

namespace App\Controllers;

use App\Models\ArtikelModel;
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
        $artikel = $this->dataArtikel->getData();

        $data = [
            'title' => 'Artikel | Karya Manunggal Jati',
            'artikel' => $artikel
        ];
        // $db =   \Config\Database::connect();
        // $artikel = $db->query("SELECT * FROM artikel");
        // foreach($artikel->getResultArray() as $row) {
        //     dd($row);
        // }
        

        return view('pages/artikel', $data);
    }
}
