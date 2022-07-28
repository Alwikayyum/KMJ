<?php

namespace App\Controllers;

class Artikel extends BaseController
{
    public function artikel()
    {
        $data = [
            'title' => 'Artikel | Karya Manunggal Jati'
        ];
        return view('pages/artikel', $data);
    }
}