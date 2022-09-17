<?php

namespace App\Controllers;

use App\Models\LayananModel;
use App\Models\IconModel;

use App\Controllers\BaseController;

class Layanan extends BaseController
{
	function __construct()
	{
		$this->layananModel = new LayananModel();
		$this->iconModel = new IconModel();
	}

	public function index()
	{
		$rules = [
			'judul' => 'required',
			'layanan' => 'required',
		];
		if (!$this->validate($rules)) {
			$icon = $this->iconModel->getAll();
			$layanan = $this->layananModel->getAll();
			$data = [
				'title' => 'Layanan',
				'icon' => $icon,
				'layanan' => $layanan,
				'total' => count($layanan),
			];
			return view('layanan/index', $data);
		} else {
			$id_layanan = $this->request->getVar('id_layanan');
			$data = [
				'judul' => $this->request->getVar('judul'),
				'layanan' => $this->request->getVar('layanan'),
				'icon' => empty($this->request->getVar('icon')) ? 'far fa-circle' : $this->request->getVar('icon'),
			];
			if ($id_layanan) {
				$this->layananModel->update($id_layanan, $data);
				session()->setFlashdata('success', 'Data Berhasil Diubah');
			} else {
				$this->layananModel->insert($data);
				session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
			}
			return redirect()->to('/layanan');
		}
	}

	public function hapus($id_layanan)
	{
		$this->layananModel->where('id_layanan', $id_layanan)->delete();
		session()->setFlashdata('success', 'Data Berhasil Dihapus');
		return redirect()->to('/layanan');
	}
}
