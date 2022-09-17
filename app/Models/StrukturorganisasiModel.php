<?php

namespace App\Models;

use CodeIgniter\Model;

class StrukturorganisasiModel extends Model
{
	protected $table                = 'tabel_struktur_organisasi';
	protected $primaryKey           = 'id_struktur_organisasi';
	protected $returnType           = 'object';
	protected $allowedFields        = ['judul', 'gambar'];

	public function getWhereFirst($where)
	{
		return $this->where($where)->first();
	}
}
