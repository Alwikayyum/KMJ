<?php

namespace App\Controllers;

use App\Models\SambutanModel;
use App\Models\BeritaModel;
use App\Models\LayananModel;
use App\Models\VisimisiModel;
use App\Models\ProfilinstitusiModel;
use App\Models\StrukturorganisasiModel;
use App\Models\FotoModel;
use App\Models\VideoModel;

class Home extends BaseController
{
	function __construct()
	{
		$this->sambutanModel = new SambutanModel();
		$this->beritaModel = new BeritaModel();
		$this->layananModel = new LayananModel();
		$this->visimisiModel = new VisimisiModel();
		$this->profilinstitusiModel = new ProfilinstitusiModel();
		$this->strukturorganisasiModel = new StrukturorganisasiModel();
		$this->fotoModel = new FotoModel();
		$this->videoModel = new VideoModel();
	}

	public function index()
	{
		$where = ['id_sambutan' => 1];
		$sambutan = $this->sambutanModel->getWhereFirst($where);
		$berita = $this->beritaModel->paginate(3);
		$layanan = $this->layananModel->getAll();
		$foto = $this->fotoModel->paginate(3);

		$data = [
			'sambutan' => $sambutan,
			'berita' => $berita,
			'layanan' => $layanan,
			'foto' => $foto,
		];
		return view('home/index', $data);
	}

	// profil
	public function profil()
	{
		$where = ['id_profil_institusi' => 1];
		$profil = $this->profilinstitusiModel->getWhereFirst($where);
		$data = [
			'title' => 'Profil Perusahaan',
			'profil' => $profil
		];
		return view('home/profil', $data);
	}

	public function visimisi()
	{
		$where = ['id_visimisi' => 1];
		$visimisi = $this->visimisiModel->getWhereFirst($where);
		$data = [
			'title' => 'Visi & Misi',
			'visimisi' => $visimisi
		];
		return view('home/visimisi', $data);
	}

	public function strukturorganisasi()
	{
		$where = ['id_struktur_organisasi' => 1];
		$strukturorganisasi = $this->strukturorganisasiModel->getWhereFirst($where);
		$data = [
			'title' => 'Struktur Organisasi',
			'strukturorganisasi' => $strukturorganisasi,
		];
		return view('home/struktur-organisasi', $data);
	}
	// end profil

	// Informasi
	public function berita()
	{
		$data = [
			'title' => 'Berita Kegiatan',
			'berita' => $this->beritaModel->paginate(3, 'tabel_berita'),
			'pager' => $this->beritaModel->pager
		];
		return view('home/berita', $data);
	}

	public function detailberita($id_berita)
	{
		$where = ['id_berita' => $id_berita];
		$berita = $this->beritaModel->getWhereFirst($where);
		$data = [
			'title' => 'Berita Kegiatan',
			'berita' => $berita
		];
		return view('home/detail-berita', $data);
	}

	public function layanan()
	{
		$layanan = $this->layananModel->getAll();
		$data = [
			'title' => 'Layanan',
			'layanan' => $layanan,
		];
		return view('home/layanan', $data);
	}
	// end Informasi

	// galeri
	public function foto()
	{
		$foto = $this->fotoModel->getAll();
		$data = [
			'title' => 'Galeri Foto',
			'foto' => $foto,
		];
		return view('home/foto', $data);
	}

	public function video()
	{
		$video = $this->videoModel->getAll();
		$data = [
			'title' => 'Galeri Video',
			'video' => $video,
		];
		return view('home/video', $data);
	}
	// end galeri
}
