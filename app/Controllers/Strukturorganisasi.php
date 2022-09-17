<?php

namespace App\Controllers;

use App\Models\StrukturorganisasiModel;

use App\Controllers\BaseController;

class Strukturorganisasi extends BaseController
{
	function __construct()
	{
		$this->strukturorganisasiModel = new StrukturorganisasiModel();
	}

	public function index()
	{
		$rules = [
			'judul' => 'required',
			'gambar' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
		];
		if (!$this->validate($rules)) {
			$where = ['id_struktur_organisasi' => 1];
			$strukturorganisasi = $this->strukturorganisasiModel->getWhereFirst($where);
			$data = [
				'title' => 'Struktur Organisasi',
				'strukturorganisasi' => $strukturorganisasi,
			];
			return view('strukturorganisasi/index', $data);
		} else {
			$id_struktur_organisasi = 1;
			// gambar
			$uploadGambar = $this->request->getFile('gambar');
			if ($uploadGambar->getError() == 4) {
				$namaGambar = $this->request->getVar('gambar_lama');
			} else {
				$namaGambar = $uploadGambar->getRandomName();
				$uploadGambar->move('assets/img', $namaGambar);
				unlink('assets/img/' . $this->request->getVar('gambar_lama'));
			}
			$data = [
				'judul' => $this->request->getVar('judul'),
				'gambar' => $namaGambar,
			];
			$this->strukturorganisasiModel->update($id_struktur_organisasi, $data);
			session()->setFlashdata('success', 'Data Berhasil Diubah');
			return redirect()->to('/strukturorganisasi');
		}
	}
}
