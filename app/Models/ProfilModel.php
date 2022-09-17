<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
	protected $table                = 'tabel_profil';
	protected $primaryKey           = 'id_profil';
	protected $returnType           = 'object';
	protected $allowedFields        = ['profil'];

	public function getAll()
	{
		return $this->orderBy('id_profil', 'DESC')->findAll();
	}
}
