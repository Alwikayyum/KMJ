<?php

namespace App\Controllers;

use App\Models\IconModel;

class Icon extends BaseController
{
    function __construct()
    {
        $this->iconModel = new IconModel();
    }

    public function index()
    {
        $rules = [
            'icon' => 'required|is_unique[tabel_icon.icon]'
        ];
        if (!$this->validate($rules)) {
            $icon = $this->iconModel->getAll();
            $data = [
                'title' => 'Icon',
                'icon' => $icon,
                'total' => count($icon),
            ];
            return view('icon/index', $data);
        } else {
            $id_icon = $this->request->getVar('id_icon');
            $data = [
                'icon' => $this->request->getVar('icon')
            ];
            if ($id_icon) {
                $this->iconModel->update($id_icon, $data);
                session()->setFlashdata('success', 'Data Berhasil Diubah');
            } else {
                $this->iconModel->insert($data);
                session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
            }
            return redirect()->to('/icon');
        }
    }

    public function hapus($id_icon)
    {
        $this->iconModel->where('id_icon', $id_icon)->delete();
        session()->setFlashdata('success', 'Data Berhasil Dihapus');
        return redirect()->to('/icon');
    }
}
