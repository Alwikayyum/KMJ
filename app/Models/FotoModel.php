<?php

namespace App\Models;

use CodeIgniter\Model;

class FotoModel extends Model
{
	protected $table                = 'tabel_foto';
	protected $primaryKey           = 'id_foto';
	protected $returnType           = 'object';
	protected $allowedFields        = ['judul', 'imggaleri'];

	public function getAll()
	{
		return $this->orderBy('id_foto', 'DESC')->findAll();
	}

	public function getWhereFirst($where)
	{
		return $this->where($where)->first();
	}
}
