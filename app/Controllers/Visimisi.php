<?php

namespace App\Controllers;

use App\Models\VisimisiModel;

use App\Controllers\BaseController;

class Visimisi extends BaseController
{
	function __construct()
	{
		$this->visimisiModel = new VisimisiModel();
	}

	public function index()
	{
		$rules = [
			'visi' => 'required',
			'misi' => 'required',
		];
		if (!$this->validate($rules)) {
			$where = ['id_visimisi' => 1];
			$visimisi = $this->visimisiModel->getWhereFirst($where);
			$data = [
				'title' => 'Visi & Misi',
				'visimisi' => $visimisi,
			];
			return view('visimisi/index', $data);
		} else {
			$id_visimisi = 1;
			$data = [
				'visi' => $this->request->getVar('visi'),
				'misi' => $this->request->getVar('misi')
			];
			$this->visimisiModel->update($id_visimisi, $data);
			session()->setFlashdata('success', 'Data Berhasil Diubah');
			return redirect()->to('/visimisi');
		}
	}
}
