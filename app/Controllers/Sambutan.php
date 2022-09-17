<?php

namespace App\Controllers;

use App\Models\SambutanModel;

use App\Controllers\BaseController;

class Sambutan extends BaseController
{
	function __construct()
	{
		$this->sambutanModel = new SambutanModel();
	}

	public function index()
	{
		$rules = [
			'sambutan' => 'required',
			'nama' => 'required',
			'jabatan' => 'required',
			'foto' => 'max_size[foto,5000]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
		];
		if (!$this->validate($rules)) {
			$where = ['id_sambutan' => 1];
			$sambutan = $this->sambutanModel->getWhereFirst($where);
			$data = [
				'title' => 'Sambutan',
				'sambutan' => $sambutan,
			];
			return view('sambutan/index', $data);
		} else {
			$id_sambutan = 1;
			// foto
			$uploadFoto = $this->request->getFile('foto');
			if ($uploadFoto->getError() == 4) {
				$namaFoto = $this->request->getVar('foto_lama');
			} else {
				$namaFoto = $uploadFoto->getRandomName();
				$uploadFoto->move('assets/img', $namaFoto);
				unlink('assets/img/' . $this->request->getVar('foto_lama'));
			}
			$data = [
				'sambutan' => $this->request->getVar('sambutan'),
				'nama' => $this->request->getVar('nama'),
				'jabatan' => $this->request->getVar('jabatan'),
				'foto' => $namaFoto,
			];
			$this->sambutanModel->update($id_sambutan, $data);
			session()->setFlashdata('success', 'Data Berhasil Diubah');
			return redirect()->to('/sambutan');
		}
	}
}
