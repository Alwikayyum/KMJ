<?php

namespace App\Controllers;

use App\Models\ConfigModel;

use App\Controllers\BaseController;

class Config extends BaseController
{
	function __construct()
	{
		$this->configModel = new ConfigModel();
	}

	public function index()
	{
		$rules = [
			'description' => 'required',
			'author' => 'required',
			'keywords' => 'required',
			'brand' => 'required',
			'copyright' => 'required',
			'login_title' => 'required',
			'logo' => 'max_size[logo,1024]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]',
			'background' => 'max_size[logo,1024]|is_image[logo]|mime_in[logo,image/jpg,image/jpeg,image/png]',
		];
		if (!$this->validate($rules)) {
			$where = ['id_config' => 1];
			$config = $this->configModel->getWhereFirst($where);
			$data = [
				'title' => 'Configurasi',
				'config' => $config,
			];
			return view('config/index', $data);
		} else {
			$id_config = 1;
			// logo
			$uploadLogo = $this->request->getFile('logo');
			if ($uploadLogo->getError() == 4) {
				$namaLogo = $this->request->getVar('logo_lama');
			} else {
				$namaLogo = $uploadLogo->getRandomName();
				$uploadLogo->move('assets/img', $namaLogo);
				unlink('assets/img/' . $this->request->getVar('logo_lama'));
			}
			// background
			$uploadBackground = $this->request->getFile('background');
			if ($uploadBackground->getError() == 4) {
				$namaBackground = $this->request->getVar('background_lama');
			} else {
				$namaBackground = $uploadBackground->getRandomName();
				$uploadBackground->move('assets/img', $namaBackground);
				unlink('assets/img/' . $this->request->getVar('background_lama'));
			}
			$data = [
				'navbar' => $this->request->getVar('navbar'),
				'brandlogo' => $this->request->getVar('brandlogo'),
				'brandcolor' => $this->request->getVar('brandcolor'),
				'sidebar' => $this->request->getVar('sidebar'),
				'description' => $this->request->getVar('description'),
				'author' => $this->request->getVar('author'),
				'keywords' => $this->request->getVar('keywords'),
				'brand' => $this->request->getVar('brand'),
				'login_title' => $this->request->getVar('login_title'),
				'copyright' => $this->request->getVar('copyright'),
				'logo' => $namaLogo,
				'background' => $namaBackground
			];
			$this->configModel->update($id_config, $data);
			session()->setFlashdata('success', 'Data Berhasil Diubah');
			return redirect()->to('/config');
		}
	}
}
