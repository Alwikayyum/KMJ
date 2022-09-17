<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LoginFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $request = \Config\Services::request();
        $db = \Config\Database::connect();
        if (!session('id_user')) {
            return redirect()->to('/login');
        } else {
            $id_user = session('id_user');
            $data = $db->table('tabel_user')->where(['id_user' => $id_user])->get()->getRow();
            $id_profil = $data->id_profil;

            $data = $db->table('tabel_navigasi')->where(['url' => $request->uri->getSegment(1)])->get()->getRow();
            $akses = $db->query("SELECT * FROM tabel_akses WHERE id_profil = $id_profil AND id_navigasi = $data->id_navigasi");

            if ($akses->resultID->num_rows < 1) {
                return redirect()->to('/dashboard/error');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
