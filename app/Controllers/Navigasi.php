<?php

namespace App\Controllers;

use App\Models\NavigasiModel;
use App\Models\IconModel;

use App\Controllers\BaseController;

class Navigasi extends BaseController
{
	function __construct()
	{
		$this->navigasiModel = new NavigasiModel();
		$this->iconModel = new IconModel();
	}

	public function index()
	{
		$rules = [
			'navigasi' => 'required',
			'urutan' => 'required',
			'dropdown' => 'required',
			'aktif' => 'required',
			'url' => 'required',
		];
		if (!$this->validate($rules)) {
			$icon = $this->iconModel->getAll();
			$navigasi = $this->navigasiModel->getAll();
			$data = [
				'title' => 'Navigasi',
				'icon' => $icon,
				'navigasi' => $navigasi,
				'total' => count($navigasi),
			];
			return view('navigasi/index', $data);
		} else {
			$id_navigasi = $this->request->getVar('id_navigasi');
			$data = [
				'navigasi' => $this->request->getVar('navigasi'),
				'urutan' => $this->request->getVar('urutan'),
				'dropdown' => $this->request->getVar('dropdown'),
				'aktif' => $this->request->getVar('aktif'),
				'url' => $this->request->getVar('url'),
				'heading' => $this->request->getVar('heading'),
				'icon' => empty($this->request->getVar('icon')) ? 'far fa-circle' : $this->request->getVar('icon'),
			];
			if ($id_navigasi) {
				$this->navigasiModel->update($id_navigasi, $data);
				session()->setFlashdata('success', 'Data Berhasil Diubah');
			} else {
				$this->navigasiModel->insert($data);
				session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
			}
			return redirect()->to('/navigasi');
		}
	}

	public function hapus($id_navigasi)
	{
		$this->navigasiModel->where('id_navigasi', $id_navigasi)->delete();
		session()->setFlashdata('success', 'Data Berhasil Dihapus');
		return redirect()->to('/navigasi');
	}
}
