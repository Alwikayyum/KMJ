<?php

namespace App\Models;

use CodeIgniter\Model;

class AksesModel extends Model
{
	protected $table                = 'tabel_akses';
	protected $primaryKey           = 'id_akses';
	protected $returnType           = 'object';
	protected $allowedFields        = ['id_profil', 'id_navigasi'];

	public function getWhereFirst($data)
	{
		return $this->where($data)->first();
	}
}
