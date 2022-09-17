<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
	protected $table                = 'tabel_berita';
	protected $primaryKey           = 'id_berita';
	protected $returnType           = 'object';
	protected $useTimestamps 		= true;
	protected $allowedFields        = ['judul', 'isi', 'sampul', 'penulis'];

	public function getAll()
	{
		return $this->orderBy('id_berita', 'DESC')->findAll();
	}

	public function getWhereFirst($where)
	{
		return $this->where($where)->first();
	}
}
