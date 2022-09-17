<?php

namespace App\Controllers;

use App\Models\FotoModel;

use App\Controllers\BaseController;

class Foto extends BaseController
{
	function __construct()
	{
		$this->fotoModel = new FotoModel();
	}

	public function index()
	{
		$foto = $this->fotoModel->getAll();
		$data = [
			'title' => 'Galeri',
			'foto' => $foto,
			'total' => count($foto)
		];
		return view('foto/index', $data);
	}

	public function form($id_foto = null)
	{
		$rules = [
			'judul' => 'required',
			'imggaleri' => [
				'rules' => 'max_size[imggaleri,1024]|is_image[imggaleri]|mime_in[imggaleri,image/jpg,image/jpeg,image/png]',
				'errors' => [
					'max_size' => 'ukuran gambar terlalu besar',
					'is_image' => 'bukan gambar',
					'mime_in' => 'bukan gambar'
				]
			]
		];
		if (!$this->validate($rules)) {
			if ($id_foto) {
				$where = ['id_foto' => $id_foto];
				$foto = $this->fotoModel->getWhereFirst($where);
				$data = [
					'title' => 'Ubah Galeri Foto',
					'foto' => $foto,
				];
			} else {
				$data = [
					'title' => 'Tambah Galeri Foto',
				];
			}
			return view('foto/form', $data);
		} else {
			$imgGaleri = $this->request->getFile('imggaleri');
			if ($id_foto) {
				if ($imgGaleri->getError() == 4) {
					$namaImgGaleri = $this->request->getVar('imggaleri_lama');
				} else {
					$namaImgGaleri = $imgGaleri->getRandomName();
					$imgGaleri->move('assets/uploads/galeri', $namaImgGaleri);
					unlink('assets/uploads/galeri/' . $this->request->getVar('imggaleri_lama'));
				}
				$data = [
					'judul' => $this->request->getVar('judul'),
					'imggaleri' => $namaImgGaleri
				];
				$this->fotoModel->update($id_foto, $data);
				session()->setFlashdata('success', 'Data Berhasil Diubah');
			} else {
				if ($imgGaleri->getError() == 4) {
					$namaImgGaleri = 'no-image.png';
				} else {
					$namaImgGaleri = $imgGaleri->getRandomName();
					$imgGaleri->move('assets/uploads/galeri', $namaImgGaleri);
				}
				$data = [
					'judul' => $this->request->getVar('judul'),
					'imggaleri' => $namaImgGaleri
				];
				$this->fotoModel->insert($data);
				session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
			}
			return redirect()->to('/foto');
		}
	}

	public function hapus($id_foto)
	{
		$foto = $this->fotoModel->find($id_foto);
		if ($foto->imggaleri != 'no-image.png') {
			unlink('assets/uploads/galeri/' . $foto->imggaleri);
		}
		$this->fotoModel->delete($id_foto);
		session()->setFlashdata('success', 'Data Berhasil Dihapus');
		return redirect()->to('/foto');
	}

	function detail()
	{
		$request = \Config\Services::request();
		$where = ['id_foto' => $request->uri->getSegment(3)];
		$foto = $this->fotoModel->getWhereFirst($where);
		$data = [
			'foto' => $foto
		];
		return view('foto/detail', $data);
	}
}
