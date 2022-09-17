<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        if (session('id_user')) {
            return redirect()->to('/dashboard');
        }
        $data = [
            'title' => 'Login'
        ];
        return view('login/index', $data);
    }

    public function process()
    {
        $db = \Config\Database::connect();

        $data = $this->request->getVar();
        $query = $db->table('tabel_user')->getWhere(['username' => $data['username']]);
        $user = $query->getRow();
        if ($user) {
            if ($user->aktif == 'Yes') {
                if (password_verify($data['password'], $user->password)) {
                    $login = [
                        'username' => $user->username,
                        'id_profil' => $user->id_profil,
                        'id_user' => $user->id_user,
                        'foto' => $user->foto
                    ];
                    session()->set($login);
                    return redirect()->to('/dashboard')->with('success', 'Selamat Datang ' . $user->nama_user);
                } else {
                    return redirect()->back()->with('error', 'Password Salah');
                }
            } else {
                return redirect()->back()->with('error', 'Akun Anda Belum Aktif');
            }
        } else {
            return redirect()->back()->with('error', 'Username Tidak Terdaftar');
        }
    }

    public function logout()
    {
        $data = ['username', 'id_profil', 'id_user', 'csrf_token'];
        session()->remove($data);
        return redirect()->to('/login')->with('success', 'Logout Berhasil');
    }
}
