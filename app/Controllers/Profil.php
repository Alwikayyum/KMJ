<?php

namespace App\Controllers;

use App\Models\ProfilModel;
use App\Models\AksesModel;
use App\Models\NavigasiModel;

class Profil extends BaseController
{
    function __construct()
    {
        $this->profilModel = new ProfilModel();
        $this->aksesModel = new AksesModel();
        $this->navigasiModel = new NavigasiModel();
    }
    public function index()
    {
        $rules = [
            'profil' => 'required|is_unique[tabel_profil.profil]'
        ];
        if (!$this->validate($rules)) {
            $profil = $this->profilModel->getAll();
            $data = [
                'title' => 'Profil',
                'profil' => $profil,
                'total' => count($profil),
            ];
            return view('profil/index', $data);
        } else {
            $id_profil = $this->request->getVar('id_profil');
            $data = [
                'profil' => $this->request->getVar('profil')
            ];
            if ($id_profil) {
                $this->profilModel->update($id_profil, $data);
                session()->setFlashdata('success', 'Data Berhasil Diubah');
            } else {
                $this->profilModel->insert($data);
                session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
            }
            return redirect()->to('/profil');
        }
    }

    public function akses($id_profil)
    {
        $navigasi = $this->navigasiModel->getAll();
        $profil = $this->profilModel->table('tabel_profil')->getWhere(['id_profil' => $id_profil])->getRow();
        $data = [
            'title' => 'Profil Akses',
            'navigasi' => $navigasi,
            'profil' => $profil,
        ];
        return view('profil/akses', $data);
    }

    public function changeaccess()
    {
        $id_profil = $this->request->getVar('id_profil');
        $id_navigasi = $this->request->getVar('id_navigasi');

        $data = [
            'id_profil' => $id_profil,
            'id_navigasi' => $id_navigasi
        ];

        $result = $this->aksesModel->getWhereFirst($data);

        if (!$result) {
            $data = [
                'id_profil' => $id_profil,
                'id_navigasi' => $id_navigasi
            ];
            $this->aksesModel->insert($data);
            session()->setFlashdata('success', 'Akses Berhasil Diubah');
        } else {
            $this->aksesModel->where($data)->delete();
            session()->setFlashdata('success', 'Akses Berhasil Dihapus');
        }
    }

    public function hapus($id_profil)
    {
        $this->profilModel->where('id_profil', $id_profil)->delete();
        session()->setFlashdata('success', 'Data Berhasil Dihapus');
        return redirect()->to('/profil');

        // $error = $this->db->errors();
        // if ($error['code'] != 0) {
        //     session()->setFlashdata('error', 'Data Gagal Dihapus, Data Sedang Digunakan');
        // }
        // return redirect()->to('/profil');
    }
}
