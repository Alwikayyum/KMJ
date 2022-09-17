<?php

namespace App\Models;

use CodeIgniter\Model;

class LayananModel extends Model
{
	protected $table                = 'tabel_layanan';
	protected $primaryKey           = 'id_layanan';
	protected $returnType           = 'object';
	protected $allowedFields        = ['judul', 'layanan', 'icon'];

	public function getAll()
	{
		return $this->orderBy('id_layanan', 'DESC')->findAll();
	}
}
