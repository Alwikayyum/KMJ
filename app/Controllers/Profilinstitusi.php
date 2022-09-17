<?php

namespace App\Controllers;

use App\Models\ProfilinstitusiModel;

use App\Controllers\BaseController;

class Profilinstitusi extends BaseController
{
	function __construct()
	{
		$this->profilinstitusiModel = new ProfilinstitusiModel();
	}

	public function index()
	{
		$rules = [
			'profil_institusi' => 'required',
		];
		if (!$this->validate($rules)) {
			$where = ['id_profil_institusi' => 1];
			$profilinstitusi = $this->profilinstitusiModel->getWhereFirst($where);
			$data = [
				'title' => 'Profil Institusi',
				'profilinstitusi' => $profilinstitusi,
			];
			return view('profilinstitusi/index', $data);
		} else {
			$id_profil_institusi = 1;
			$data = [
				'profil_institusi' => $this->request->getVar('profil_institusi')
			];
			$this->profilinstitusiModel->update($id_profil_institusi, $data);
			session()->setFlashdata('success', 'Data Berhasil Diubah');
			return redirect()->to('/profilinstitusi');
		}
	}
}
