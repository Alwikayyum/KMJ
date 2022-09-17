<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProfilModel;

use App\Controllers\BaseController;

class User extends BaseController
{
	function __construct()
	{
		$this->userModel = new UserModel();
		$this->profilModel = new ProfilModel();
	}

	public function index()
	{
		$rules = [
			'password' => 'required|trim|min_length[8]|matches[passconfirm]',
			'passconfirm' => 'required|trim|min_length[8]|matches[password]'
		];
		if (!$this->validate($rules)) {
			$user = $this->userModel->getAll();
			$data = [
				'title' => 'User',
				'user' => $user,
				'total' => count($user)
			];
			return view('user/index', $data);
		} else {
			$id_user = $this->request->getVar('id_user');
			$data = [
				'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
			];
			$this->userModel->update($id_user, $data);
			session()->setFlashdata('success', 'Data Berhasil Diubah');
			return redirect()->to('/user');
		}
	}

	public function form($id_user = null)
	{
		if ($id_user) {
			$where = ['id_user' => $id_user];
			$user = $this->userModel->getWhereFirst($where);
			if ($user->username == $this->request->getVar('username')) {
				$rules = [
					'username' => 'required'
				];
			} else {
				$rules = [
					'username' => 'required|trim|is_unique[tabel_user.username]'
				];
			}
		} else {
			$rules = [
				'username' => 'required|trim|is_unique[tabel_user.username]',
				'password' => 'required|trim|min_length[8]|matches[passconfirm]',
				'passconfirm' => 'required|trim|min_length[8]|matches[password]'
			];
		}

		$rules = [
			'nama_user' => 'required',
			'id_profil' => 'required',
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
			$profil = $this->profilModel->getAll();
			if ($id_user) {
				$where = ['id_user' => $id_user];
				$user = $this->userModel->getWhereFirst($where);
				$data = [
					'title' => 'Ubah User',
					'profil' => $profil,
					'user' => $user,
				];
			} else {
				$data = [
					'title' => 'Tambah User',
					'profil' => $profil,
					'total' => count($profil),
				];
			}
			return view('user/form', $data);
		} else {
			$fotoUser = $this->request->getFile('foto');
			if ($id_user) {
				if ($fotoUser->getError() == 4) {
					$namaFoto = $this->request->getVar('foto_lama');
				} else {
					$namaFoto = $fotoUser->getRandomName();
					$fotoUser->move('assets/img', $namaFoto);
					unlink('assets/img/' . $this->request->getVar('foto_lama'));
				}
				$data = [
					'username' => $this->request->getVar('username'),
					'nama_user' => $this->request->getVar('nama_user'),
					'telpon' => $this->request->getVar('telpon'),
					'id_profil' => $this->request->getVar('id_profil'),
					'aktif' => $this->request->getVar('aktif'),
					'foto' => $namaFoto
				];
				$this->userModel->update($id_user, $data);
				session()->setFlashdata('success', 'Data Berhasil Diubah');
			} else {
				if ($fotoUser->getError() == 4) {
					$namaFoto = 'noprofil.png';
				} else {
					$namaFoto = $fotoUser->getRandomName();
					$fotoUser->move('assets/img', $namaFoto);
				}
				$data = [
					'username' => $this->request->getVar('username'),
					'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
					'nama_user' => $this->request->getVar('nama_user'),
					'telpon' => $this->request->getVar('telpon'),
					'id_profil' => $this->request->getVar('id_profil'),
					'aktif' => $this->request->getVar('aktif'),
					'foto' => $namaFoto
				];
				$this->userModel->insert($data);
				session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
			}
			return redirect()->to('/user');
		}
	}

	public function hapus($id_user)
	{
		$user = $this->userModel->find($id_user);
		if ($user->foto != 'noprofil.png') {
			unlink('assets/img/' . $user->foto);
		}
		$this->userModel->delete($id_user);
		session()->setFlashdata('success', 'Data Berhasil Dihapus');
		return redirect()->to('/user');
	}

	function detail()
	{
		$request = \Config\Services::request();
		$where = ['id_user' => $request->uri->getSegment(3)];
		$user = $this->userModel->getWhereFirst($where);
		$data = [
			'user' => $user
		];
		return view('user/detail', $data);
	}
}
