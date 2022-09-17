<?php

namespace App\Controllers;

use App\Models\IconModel;
use App\Models\NavigasiModel;
use App\Models\ProfilModel;
use App\Models\UserModel;

class Dashboard extends BaseController
{
    function __construct()
    {
        $this->iconModel = new IconModel();
        $this->navigasiModel = new NavigasiModel();
        $this->profilModel = new ProfilModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $icon = $this->iconModel->getAll();
        $navigasi = $this->navigasiModel->getAll();
        $profil = $this->profilModel->getAll();
        $user = $this->userModel->getAll();

        $data = [
            'title' => 'Dashboard',
            'icon' => count($icon),
            'navigasi' => count($navigasi),
            'profil' => count($profil),
            'user' => count($user),

        ];
        return view('dashboard/index', $data);
    }

    function error()
    {
        $data['title'] = 'No Access';
        return view('dashboard/no-access', $data);
    }

    public function profil()
    {
        $where = ['id_user' => session('id_user')];
        $user = $this->userModel->getWhereFirst($where);
        $data = [
            'title' => 'Profil User',
            'user' => $user
        ];
        return view('dashboard/profil', $data);
    }

    public function changeprofil()
    {
        $rules = [
            'nama_user' => 'required',
            'telpon' => 'required',
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar terlalu besar',
                    'is_image' => 'bukan gambar',
                    'mime_in' => 'bukan gambar'
                ]
            ]
        ];
        if (!$this->validate($rules)) {
            $where = ['id_user' => session('id_user')];
            $user = $this->userModel->getWhereFirst($where);
            $data = [
                'title' => 'Ganti Profil',
                'user' => $user,
            ];
            return view('dashboard/changeprofil', $data);
        } else {
            $id_user = session('id_user');
            $fotoUser = $this->request->getFile('foto');
            if ($fotoUser->getError() == 4) {
                $namaFoto = $this->request->getVar('foto_lama');
            } else {
                $namaFoto = $fotoUser->getRandomName();
                $fotoUser->move('assets/img', $namaFoto);
                unlink('assets/img/' . $this->request->getVar('foto_lama'));
            }
            $data = [
                'nama_user' => $this->request->getVar('nama_user'),
                'telpon' => $this->request->getVar('telpon'),
                'foto' => $namaFoto
            ];

            $this->userModel->update($id_user, $data);
            session()->setFlashdata('success', 'Data Berhasil Diubah');
            return redirect()->to('/dashboard/changeprofil');
        }
    }

    public function changepass()
    {
        $rules = [
            'password' => 'required|trim|min_length[8]|matches[passconfirm]',
            'passconfirm' => 'required|trim|min_length[8]|matches[password]',
            'oldpass' => 'required'
        ];

        if (!$this->validate($rules)) {
            $where = ['tabel_user.id_user' => session('id_user')];
            $user = $this->userModel->getWhereFirst($where);
            $data = [
                'title' => 'Ganti password',
                'user' => $user,
            ];
            return view('dashboard/changepass', $data);
        } else {
            $oldpass = $this->request->getVar('oldpass');
            $password = $this->request->getVar('password');
            $id_user = session('id_user');
            // dd($oldpass);

            $where = ['tabel_user.id_user' => session('id_user')];
            $user = $this->userModel->getWhereFirst($where);
            if (password_verify($oldpass, $user->password)) {
                $data = ['password' => password_hash($password, PASSWORD_BCRYPT),];
                $this->userModel->update($where, $data);
                session()->setFlashdata('success', 'Data Berhasil Diubah');
                return redirect()->to('/dashboard');
            } else {
                session()->setFlashdata('error', 'Password Salah');
                return redirect()->to('/dashboard/changepass/' . $id_user);
            }
        }
    }
}
