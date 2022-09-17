<?php

namespace App\Controllers;

use App\Models\BeritaModel;

use App\Controllers\BaseController;

class Berita extends BaseController
{
	function __construct()
	{
		$this->beritaModel = new BeritaModel();
	}

	public function index()
	{
		$berita = $this->beritaModel->getAll();
		$data = [
			'title' => 'Berita',
			'berita' => $berita,
			'total' => count($berita)
		];
		return view('berita/index', $data);
	}

	public function form($id_berita = null)
	{
		$rules = [
			'judul' => 'required',
			'penulis' => 'required',
			'isi' => 'required',
			'sampul' 	=> 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
		];
		if (!$this->validate($rules)) {
			if ($id_berita) {
				$where = ['id_berita' => $id_berita];
				$berita = $this->beritaModel->getWhereFirst($where);
				$data = [
					'title' => 'Ubah Berita',
					'berita' => $berita,
				];
			} else {
				$data = [
					'title' => 'Tambah Berita',
				];
			}
			return view('berita/form', $data);
		} else {
			$sampulBerita = $this->request->getFile('sampul');
			if ($id_berita) {
				if ($sampulBerita->getError() == 4) {
					$namaSampul = $this->request->getVar('sampul_lama');
				} else {
					$namaSampul = $sampulBerita->getRandomName();
					$sampulBerita->move('assets/uploads/images', $namaSampul);
					unlink('assets/uploads/images/' . $this->request->getVar('sampul_lama'));
				}
				$data = [
					'judul' => $this->request->getVar('judul'),
					'isi' => $this->request->getVar('isi'),
					'penulis' => $this->request->getVar('penulis'),
					'sampul' => $namaSampul
				];
				$this->beritaModel->update($id_berita, $data);
				session()->setFlashdata('success', 'Data Berhasil Diubah');
			} else {
				if ($sampulBerita->getError() == 4) {
					$namaSampul = 'no-image.png';
				} else {
					$namaSampul = $sampulBerita->getRandomName();
					$sampulBerita->move('assets/uploads/images', $namaSampul);
				}
				$data = [
					'judul' => $this->request->getVar('judul'),
					'penulis' => $this->request->getVar('penulis'),
					'isi' => $this->request->getVar('isi'),
					'sampul' => $namaSampul
				];
				$this->beritaModel->insert($data);
				session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
			}
			return redirect()->to('/berita');
		}
	}

	public function hapus($id_berita)
	{
		$berita = $this->beritaModel->find($id_berita);
		if ($berita->sampul != 'no-image.png') {
			unlink('assets/uploads/images/' . $berita->sampul);
		}
		$this->beritaModel->delete($id_berita);
		session()->setFlashdata('success', 'Data Berhasil Dihapus');
		return redirect()->to('/berita');
	}

	function detail()
	{
		$request = \Config\Services::request();
		$where = ['id_berita' => $request->uri->getSegment(3)];
		$berita = $this->beritaModel->getWhereFirst($where);
		$data = [
			'berita' => $berita
		];
		return view('berita/detail', $data);
	}
}
