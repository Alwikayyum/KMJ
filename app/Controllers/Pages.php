<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Karya Manunggal Jati'
        ];
        return view('pages/home', $data);
    }
    public function profil()
    {
        $data = [
            'title' => 'Profil | Karya Manunggal Jati'
        ];
        return view('pages/profil', $data);
    }
    public function artikel()
    {
        $data = [
            'title' => 'Artikel | Karya Manunggal Jati'
        ];
        return view('pages/artikel', $data);
    }
}
